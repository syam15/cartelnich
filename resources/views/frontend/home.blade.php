@extends('layouts.frontend.app')
@section('content')
    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            <div class="slider-item" style="background-image: url({{ asset('frontend') }}/images/bg2.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                        <div class="col-md-12 ftco-animate text-center">
                            <h1 class="mb-2">We present many choices</h1>
                            <h2 class="subheading mb-4"> Online shopping for various kinds of weapons. Starting from quality airsoft, airguns, bullets, shooting equipment & accessories.</h2>
                            <p><a href="/shop" class="btn btn-primary">View Details</a></p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="slider-item" style="background-image: url({{ asset('frontend') }}/images/bg.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                        <div class="col-sm-12 ftco-animate text-center">
                            <h1 class="mb-2">Your favorite gun shop</h1>
                            <p><a href="/shop" class="btn btn-primary">View Details</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row no-gutters ftco-services">
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-shipped"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Free Shipping</h3>
                            <span>On order over Rp 250.000</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-award"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Trustworthy</h3>
                            <span>Product is original and trustworthy.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-award"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Superior Quality</h3>
                            <span>Quality Products</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Support</h3>
                            <span>24/7 Support</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Featured Products</span>
                    <h2 class="mb-4">Our Products</h2>
                    <p>We are here to make it easy for you~</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($data as $d)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="javascript:void(0)" class="img-prod" id="details"
                                data-url="{{ route('details', $d->id) }}"
                                data-img="{{ asset('backend/products/' . $d->thumbnails) }}"><img class="img-fluid"
                                    src="{{ asset('backend/products/' . $d->thumbnails) }}">
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="javascript:void(0)">{{ $d->product_name }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span>{{ rupiah($d->price) }}</span></p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="javascript:void(0)" id="buynow" data-url="{{ route('details', $d->id) }}"
                                            data-img="{{ asset('backend/products/' . $d->thumbnails) }}"
                                            class="buy-now d-flex justify-content-center align-items-center mx-1">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                        <form action="{{ route('wishlist.store') }}" method="POST" id="wishlists">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $d->id }}">
                                            <a href="javascript:void(0)"
                                                onclick="this.closest('form').submit();return false;"
                                                class="heart d-flex justify-content-center align-items-center ">
                                                <span><i class="ion-ios-heart"></i></span>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Modal -->
                <div class="modal fade" id="detailProduct" tabindex="-1" role="dialog" aria-labelledby="detailLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detailLabel">Detail Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('carts.store') }}" method="POST">
                                    @csrf
                                    <div class="align-content-center text-center align-items-center">
                                        <img id="products_img" src="" height="70%" width="70%"></img>
                                        <hr>
                                        <h4><span id="name"></span></h4>
                                        <h5>Rp. <span id="price"></span> | <small id="weight"></small></h5>
                                        <p><span id="descriptions"></span></p>
                                        <div class="row mt-4">
                                            <div class="col-md-3"></div>
                                            <div class="input-group col-md-6 d-flex mb-3">
                                                <span class="input-group-btn mr-2">
                                                   <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                                  <i class="ion-ios-remove"></i>
                                                   </button>
                                                   </span>
                                                   <input type="hidden" name="product_id" value="" id="product_id">
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100" style="text-align:center">
                                                <span class="input-group-btn ml-2">
                                                   <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                                    <i class="ion-ios-add"></i>
                                                </button>
                                                </span>
                                             </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <a href="javascript:void(0)"
                                                onclick="this.closest('form').submit();return false;"
                                                class="btn btn-primary py-3 px-4">Add to cart</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ $data->links('custom') }}

    </section>

    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <span class="subheading">Testimony</span>
                    <h2 class="mb-4">Our satisfied customer says</h2>
                    <p>First of all, thank you to everyone who has purchased a firearm from us. Here’s what they have to say.</p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('frontend') }}/images/orang1.jpeg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">The air gun I purchased was of excellent quality and exactly as described. 
                                        Shipping was fast, and the customer service was outstanding. Highly recommended.</p>
                                    <p class="name">Si Boy</p>
                                    <span class="position">Writer Berkelas</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('frontend') }}/images/orang2.jpeg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">I’ve bought airsoft guns from other sellers before, 
                                        but this experience was by far the best. Great prices, authentic products, and reliable delivery.</p>
                                    <p class="name">Pak Vincent</p>
                                    <span class="position">2 Orang Tapi 1</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('frontend') }}/images/orang3.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Amazing service and top-quality air guns! 
                                        The team answered all my questions promptly, and the product exceeded my expectations. Will shop again soon.</p>
                                    <p class="name">Sugeng</p>
                                    <span class="position">Kunci Gunung Bromo & Kelud</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('frontend') }}/images/orang4.jpeg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">I’m very happy with my purchase. 
                                        The airsoft gun works perfectly, and the entire process, from ordering to delivery, was smooth and efficient.</p>
                                    <p class="name">Saiful</p>
                                    <span class="position">Human Signal 7G</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5"
                                    style="background-image: url({{ asset('frontend') }}/images/orang5.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">This is my go-to place for airsoft gear. 
                                        The selection is fantastic, prices are competitive, and the shipping is always quick. Highly trustworthy.</p>
                                    <p class="name">King Idris</p>
                                    <span class="position">Raja Kegelapan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container py-4">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                    <span>Get e-mail updates about our latest shops and special offers</span>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Enter email address">
                            <input type="submit" value="Subscribe" class="submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
