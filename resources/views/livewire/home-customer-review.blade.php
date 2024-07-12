@push('testimonial', 'active')
<div>
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(front_assets/img/bg-img-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Testimonial</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Testimonial</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div>
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-5 col-xl-5 mb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <img src="front_assets/img/Customer feedback.gif"
                        class="img-fluid" alt="Sample image">
                </div>

                <div class="col-md-8 col-lg-7 col-xl-5 offset-xl-1">
                    <div class="wow fadeInUp" data-wow-delay="0.28s">
                        <form>
                            <div class="row g-3 p-3 pt-0 pb-4" style="border: 1px solid rgba(0, 0, 0, 0.173);">
                                <h3 class="text-center">Add Your Review</h3>
                                <small class="text-center m-0">
                                    <font color="red">*</font>Required fields
                                </small>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('Title') is-invalid @enderror"
                                            id="Title" placeholder="Title" wire:model='Title'>
                                        <label for="Title">Title<font color="red">*</font></label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="float-left mt-2" style="margin-left: 10px">
                                        Rating<font color="red">*</font>
                                    </label>
                                    @error('Rate')
                                    <div class="text-danger text-sm" style="font-size: 13px; margin-left:10px"> {{
                                        $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="rate" style="margin-left:-7px">
                                            <input type="radio" id="star5" wire:model="Rate" value="5" />
                                            <label for="star5" title="text">5
                                                stars</label>
                                            <input type="radio" id="star4" wire:model="Rate" value="4" />
                                            <label for="star4" title="text">4
                                                stars</label>
                                            <input type="radio" id="star3" wire:model="Rate" value="3" />
                                            <label for="star3" title="text">3
                                                stars</label>
                                            <input type="radio" id="star2" wire:model="Rate" value="2" />
                                            <label for="star2" title="text">2
                                                stars</label>
                                            <input type="radio" id="star1" wire:model="Rate" value="1" />
                                            <label for="star1" title="text">1
                                                star</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control @error('Comment') is-invalid @enderror"
                                            placeholder="Leave a comment here" id="message" style="height: 120px"
                                            wire:model='Comment'></textarea>
                                        <label for="message">Comment<font color="red">*</font></label>
                                    </div>
                                </div>
                                @if (session()->has('message'))
                                <div class="col-12">
                                    <div x-transition.duration.500ms x-data="{ open: true }"
                                        x-init="setTimeout(() => { open = false }, 2000)" x-show="open"
                                        class="alert alert-success mb-0" id="alert">
                                        {{-- <button type="button" class="close btn btn-sm"
                                            data-dismiss="alert">X</button> --}}
                                        <div style="text-align:center"> {{ session('message') }} </div>
                                    </div>
                                </div>
                                @endif
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="button" wire:click="saveData">
                                        SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Testimonial Start --}}
    <div class="mt-4">
        <div class="section-title mb-4 wow fadeInUp" data-wow-delay="0.1s">
            <h4 class="text-center mb-3" style="color:#d9122b">OUR CLIENTS</h4>
            <h4 class="text-center section-sub-title" style="font-size: 19px;">What our clients are saying about us.
            </h4>
        </div>
        @foreach ($review_data as $row_R)
        <div class="container d-flex justify-content-center mb-3 wow fadeInUp" data-wow-delay="0.2s">
            <!-- ITEM -->
            <div class="item d-flex justify-content-center w-100">
                <div class="testimonial-item" style="box-shadow: 0px 10px 15px 0 rgb(0 0 0 / 16%);">
                    <div class="author-img" style="height: 70px; width:70px;">
                        <img alt="Image" class="img-fluid" src="front_assets/img/user0.png">
                    </div>
                    <div class="author">
                        <h4 class="name">{{ $row_R->customer_fname }}</h4>
                        <div class="location">{{ $row_R->title }}</div>
                    </div>
                    <div class="rating">
                        @for ($i = $row_R->rating; $i > 0; $i--)
                        <i class="fa fa-star voted" aria-hidden="true"></i>
                        @endfor
                    </div>
                    <div class="col-lg-12 testimonial-comment" style="background-color: rgb(255, 206, 206); border-radius: 5px; max-height:60px;overflow-y: scroll;">
                        <p class="p-2" style="max-width: 100%;overflow: hidden;word-wrap: break-word;">
                            {{ $row_R->comments }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{-- Testimonial End --}}
</div>