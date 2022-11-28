@extends('frontend.layouts.app')

@section('content')
    <!-- Honor's Talk Area Start -->
    <div class="honors-talk ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="honorsCard">
                        <h3>President</h3>
                        <div class="honorsCardContent">
                            <img src="{{ getFile(getOption('president_image')) }}" alt="image" />
                            <h4>{{ getOption('president_name') }}</h4>
                            <p>
                                Clear has four valid values as well. The value both is most
                                commonly used, which clears floats coming from either
                                direction. The values left and right can be used to onl until IE8 The value both is most commonly used, The value both is most commonl be used to onl until IE8 The value both is most commonly used, The value both is most commonly used,.right can be Clear has four valid values as well. The value both is most commonly used, which clears floats coming from either direction most commonly used,.right can be The values left and right can
                            </p>
                            <a href="#" class="read-more-btn">Read More <iconify-icon icon="teenyicons:arrow-right-solid"></iconify-icon></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="honorsCard">
                        <h3>Secretary</h3>
                        <div class="honorsCardContent">
                            <img src="{{ getFile(getOption('secretary_image')) }}" alt="image" />
                            <h4>{{ getOption('secretary_name') }}</h4>
                            <p>
                                Clear has four valid values as well. The value both is most
                                commonly used, which clears floats coming from either
                                direction. The values left and right can be used to onl until IE8 The value both is most commonly used, The value both is most commonl be used to onl until IE8 The value both is most commonly used, The value both is most commonly used,.right can be Clear has four valid values as well. The value both is most commonly used, which clears floats coming from either direction most commonly used,.right can be The values left and right can
                            </p>
                            <a href="#" class="read-more-btn">Read More <iconify-icon icon="teenyicons:arrow-right-solid"></iconify-icon></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Honor's Talk Area End -->

    <!-- Photo Gallery Area Start -->
    <div class="gallery ptb-70 bg-eeeeee">
        <div class="container">
            <div class="section-header">
                <div class="section-title">
                    <h6>Dushaa Exclusive</h6>
                    <h3>Featured Gallery</h3>
                </div>
                <a href="#" class="default-button"> <span>See More</span></a>
            </div>
            <div class="gallery-content">
                <div class="row">
                    @foreach($featuredPhotos as $featuredPhoto)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="gallery-card mt-30">
                            <div class="gallery-card-img">
                                <a href="{{ getFile($featuredPhoto->image) }}" data-lightbox="roadtrip">
                                    <img src="{{ getFile($featuredPhoto->image) }}" alt="image"></a>
                            </div>
                            <h3>{{ $featuredPhoto->title }}</h3>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- Photo Gallery Area End -->

    <!-- Video Gallery Area Start -->
    <div class="video-gallery ptb-70">
        <div class="container">
            <div class="section-title section-middle">
                <h6>Dushaa Exclusive Video</h6>
                <h3>Featured Video Gallery</h3>
            </div>
            <div class="row">
                @foreach($featuredVideos as $featuredVideo)
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="video-card mt-30">
                        <iframe src="https://www.youtube.com/embed/{{ $featuredVideo->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Video Gallery Area End -->
@endsection
