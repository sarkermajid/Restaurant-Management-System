<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of cakes with quality taste</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">
                @foreach ($food_items_show as $items)
                <form action="{{ url('/add_cart/'.$items->id) }}" method="POST">
                    @csrf
                    <div class="item">
                        <div class='card' style="background-image: url('/foodimage/{{ $items->image }}')">
                            <div class="price"><h6>{{ $items->price }}</h6></div>
                            <div class='info'>
                              <h1 class='title'>{{ $items->title }}</h1>
                              <p class='description'>{{ $items->description }}</p>
                              <div class="main-text-button">
                                  <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                              </div>
                            </div>
                        </div>
                        <input class="form-control" type="number" name="quantity" placeholder="Select Quantity">
                        <input class="btn btn-outline-info w-100" type="submit" value="Add To Cart">
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</section>