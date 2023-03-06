<?php

namespace App\Http\Livewire;



use App\Models\User;
use App\Models\Faculty;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


class UserShow extends Component
{
    use WithPagination;

    // protected $paginationTheme = 'bootstrap';


    public $search = "";
    public $paginate = 10;
    public $selectedFaculty = null;
    public $authorizing = "";

    public $first_name, $middle_name, $last_name,
           $gender, $email, $address,
           $contact_number, $faculty_id, $role,
           $password, $confirm_password, $user_id;





    protected function rules()
    {
        return [
            'first_name' => 'required|string|min:6',
            'middle_name' => 'required|string|min:6',
            'last_name' => 'required|string|min:6',
            'gender' => 'required|string|min:2',
            'email' => ['required', 'email','unique:'.User::class],
            'address' => 'required|string|min:6',
            'contact_number' => 'required|string|min:6',
            'role' => 'required',
            'faculty_id' => Rule::requiredIf(function ()  {
                return in_array(request()->role,['Faculty extensionist','Extension coordinator','nullable']); }),
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6'
        ];
    }

    // Save User
    public function saveUser()
    {
        $this->validate();

       $user = User::create([

            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'address' => $this->address,
            'email' => $this->email,
            'contact_number' => $this->contact_number,
            'faculty_id' => $this->faculty_id,
            'password' => Hash::make($this->password),

             $this->assignRole($this->input('role'))
        ]);

        session()->flash('message', 'User added successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    // Edit user
    public function editUser(int $user_id)
    {
        $user = User::find($user_id);
        if($user){
           $this->user_id = $user->id;
           $this->first_name = $user->first_name;
           $this->middle_name = $user->middle_name;
           $this->last_name = $user->last_name;
           $this->gender = $user->gender;
           $this->email = $user->email;
           $this->address = $user->address;
           $this->contact_number = $user->contact_number;
           $this->faculty_id = $user->faculty_id;
        }else{
            return redirect()->to('/users');
        }
    }

    // Update User
    public function updateUser()
    {
        $validatedData =  $this->validate();

        User::where('id', $this->user_id)->update([
            'first_name' => $validatedData['first_name'],
            'middle_name' => $validatedData['middle_name'],
            'last_name' => $validatedData['last_name'],
            'gender' => $validatedData['gender'],
            'email' => $validatedData['email'],
            'address' => $validatedData['address'],
            'contact_number' => $validatedData['contact_number'],
            'faculty_id' => $validatedData['faculty_id'],

        ]);

        session()->flash('message', 'User update successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');


    }


    // Delete User
    public function deleteUser(int $user_id)
    {
        $this->user_id = $user_id;
    }

    // Destroy User
    public function destroyUser()
    {
       User::find($this->user_id)->delete();

       session()->flash('message', 'User delete successfully');
       $this->resetInput();
       $this->dispatchBrowserEvent('close-modal');
    }


    public function closeModal()
    {
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->first_name = '';
        $this->middle_name = '';
        $this->last_name = '';
        $this->gender = '';
        $this->email = '';
        $this->address = '';
        $this->contact_number = '';
        $this->password = '';
        $this->confirm_password = '';
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {



        return view('livewire.user-show', [
            'users' => User::with(['faculty'])
            ->search(trim($this->search))
            ->when($this->selectedFaculty, function ($query){
            $query->where('faculty_id', $this->selectedFaculty);
            })
            ->when($this->authorizing, function ($query){
            $query->where('authorize', $this->authorizing);
            })
            ->orderBy('authorize', 'asc')
            ->paginate($this->paginate),
            // 'authorized' => User::orderBy('authorize', 'asc')->pluck('name', 'id')->prepend('Select', ''),
            'faculties' => Faculty::orderBy('name')->pluck('name', 'id')->prepend('All Faculties', ''),
    ]);
    }




}
