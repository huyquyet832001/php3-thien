<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3">
            <div class="border">
                <div class="card-header list-group-item-secondary">
                    <a href="#" style="text-decoration: none;">
                        <h6>Danh Mục Sản Phẩm</h6>
                    </a>
                </div>
                <div class="list-group list-group-flush">
                    @foreach ($cates as $item)
                        <a class="list-group-item list-group-item-action"
                            href="{{ route('users.page.category', ['id' => $item->id]) }}">{{ $item->name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="poster">
                <a href="#" class="d-block w-100 mt-3" alt=""></a>
            </div>
        </div>
        <div class="col-xl-9">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="1000">
                        <img src="image/slider4.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="image/slider.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="image/slider2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="image/slider3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-xl-3">
            <img src="image/banner1.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-xl-3">
            <img src="image/banner2.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-xl-3">
            <img src="image/banner3.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-xl-3">
            <img src="image/banner4.jpg" class="img-fluid" alt="">
        </div>
    </div>
</div>
