<div class="hero-section section position-relative">
    <div class="hero-slider">



        @foreach($sliders as $slider)

            <!--Hero Item start-->
                <div class="hero-item hero-item-2" style="background-image: url({{asset('assets/images/slider/'.$slider->image)}}">
                    <div class="container container-1520">
                        <div class="row">
                            <div class="col-12">

                                <!--Hero Content start-->
                                <div class="hero-content">
                                    <h1>{{$slider->name}}</h1>
                                    <h2>{{$slider->description}}</h2>
                                    <a class="df-btn" href="#">Let`s Go</a>
                                </div>
                                <!--Hero Content end-->

                            </div>
                        </div>
                    </div>
                </div>
                <!--Hero Item end-->

        @endforeach


    </div>
</div>
