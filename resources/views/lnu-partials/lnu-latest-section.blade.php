<div class="bg-gradient-to-r from-blue-800 to-blue-700 h-10"></div>
    <section class="min-h-[80vh] bg-slate-200 flex flex-col md:flex-col lg:flex-col xl:flex-row lg:items-center ">
         {{--  Latest Events  --}}
        <div class="w-full md:w-full lg:w-full min-h-[70vh] lg:pl-10 md:pl-0 md:justify-center  ">
            <div class=" lg:w-full min-h-[70vh]  md:p-10 p-10">
             <h1 class="text-blue-700 font-semibold text-5xl py-10 underline underline-offset-8 text-center md:tex-center lg:text-left">Latest Events</h1>

                <div class="bg-red-200  lg:w-full min-h-[50vh] slider overflow-hidden rounded-lg relative drop-shadow-lg md:w-full 2xl:w-4/5">



                    <!--Image slide start -->
                    {{--  w-[171rem] min-h-[50vh]  --}}

                    <div class="bg-blue-500  flex slides">

                        <!--radio buttons start-->
                        <input type="radio" name="radio-btn" id="radio1">
                        <input type="radio" name="radio-btn" id="radio2">
                        <input type="radio" name="radio-btn" id="radio3">
                        <input type="radio" name="radio-btn" id="radio4">
                        <!--radio buttons end-->


                        @php $i = 1; @endphp
                        @foreach ($slider as $event )

                        <div class="slide relative {{ $i == '1' ?  'first': '' }} w-full bg-red-500 ">
                            @php $i++; @endphp
                            <img id="showImage" class=""src="{{ (!empty($event->image))? url('upload/image-folder/'. $event->image): url('upload/no-image.png') }}" alt="">

                            <div class="bg-gradient-to-t from-blue-800/90 via-blue-800/55  w-full h-full absolute  top-0 rounded-md"></div>
                            <div class="absolute  bottom-16 p-5 flex flex-col ">
                                <h1 class="text-white text-3xl font-semibold drop-shadow-lg">{{ $event->title }}</h1>
                                <p class=" md:text-md lg:text-lg text-white drop-shadow-lg mt-3">{{Str::limit($event->description, 200)}}</p>
                                <h1 class="text-white text-lg outline outline-offset-2 outline-2 w-28 mt-5 rounded-lg text-center">Learn more</h1>
                            </div>
                        </div>
                        @endforeach

                        <div class="navigation-auto  w-full flex justify-center">
                            <div class="auto-btn1"></div>
                            <div class="auto-btn2"></div>
                            <div class="auto-btn3"></div>
                            <div class="auto-btn4"></div>
                          </div>
                          <!--automatic navigation end-->
                        </div>
                          <!--Image slide end -->


                    <!--manual navigation start-->
                    <div class="navigation-manual w-full flex justify-center">
                      <label for="radio1" class="manual-btn"></label>
                      <label for="radio2" class="manual-btn"></label>
                      <label for="radio3" class="manual-btn"></label>
                      <label for="radio4" class="manual-btn"></label>

                  </div>
                    <!--manual navigation end-->
                  </div>
                  <!--automatic navigation start-->



                </div>


                <script type="text/javascript">
                    var counter = 1;
                    setInterval(function(){
                      document.getElementById('radio' + counter).checked = true;
                      counter++;
                      if(counter > 4){
                        counter = 1;
                      }
                    }, 5000);
                    </script>

            </div>








        {{--  Latest News  --}}
        <div class=" pl-10 z-10 md:w-full lg:w-full  xl:min-h-screen 2xl:min-h-screen  relative">
            <div class="z-20 bg-white lg:left-16 rounded-lg p-10 shadow-lg md:w-full lg:w-full  xl:top-20 xl:left-8 xl:absolute  xl:w-11/12   2xl:left-10 2xl:w-11/12 2xl:l-35  2xl:top-24">
            <h1 class="text-blue-700 font-semibold text-5xl text-center lg:text-left md:text-center xl:p-0 xl:text-5xl 2xl:text-5xl xl:py-10 2xl:py-10 underline underline-offset-8 ">Latest News</h1>
            <div class=" flex  w-full  flex-col space-y-7 ">
                {{--  Lastest 1  --}}

                @foreach ($newsUpdate as $news)


                <div class="w-full bg-gradient-to-r from-blue-800 to-blue-600  rounded-lg flex-col md:flex-col p-5 lg:flex-col xl:p-5 xl:h-30 ">

                    <div class="grid lg:grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3">
                        {{--  md:grid-cols-2 lg:grid-cols-2 gap-2 xl:grid-rows-2 xl:grid-cols-1  --}}

                        <div class="  flex-1 space-y-4 md:col-start-1 md:col-end-3 lg:row-span-1 xl:space-y-5 xl:col-span-2  2xl:row-start-1 xl:self-start 2xl:col-end-3 ">
                            <h1 class="text-xl font-semibold w-3/4 text-white 2xl:w-full">{{ $news->title }}</h1>
                            <p class="text-slate-400 text-xs ">{{ $news->created_at->diffForHumans() }}</p>
                            <p class="text-white text-sm md:text-base lg:text-md pr-5 xl:text-sm 2xl:text-md">{{ Str::limit($news->description, 185) }}</p>
                            <h1 class="text-white text-md outline outline-offset-2 outline-1 w-28 my-4 rounded-lg text-center">read more</h1>
                        </div>

                        <div class="h-44 mt-5 basis-40 rounded row-start-1 row-end-2 md:col-start-3 md:col-end-4 xl:row-span-3 xl:flex xl:items-stretch 2xl:col-span-1 ">

                            <img id="showImage" class="object-cover w-full h-full rounded" src="{{ (!empty($news->image))? url('upload/image-folder/'. $news->image): url('upload/no-image.png') }}" alt="">
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        </div>
    </section>


