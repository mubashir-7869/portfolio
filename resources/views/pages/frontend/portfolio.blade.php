
<div class="page-section" id="portfolio">
    <div class="content-wrapper">
        <div class="inner-container container">
            <div class="section-heading">
                <h4>Our Portfolio</h4>
                <div class="line-dec"></div>
            </div>
            <div class="filter-categories">
                <ul class="project-filter">
                    <li class="filter" data-filter="all"><span>All</span></li>
                    @foreach($categories as $category)
                        <li class="filter" data-filter="{{ $category->id }}"><span>{{ $category->title }}</span></li>
                    @endforeach
                </ul>
            </div>
            <div class="projects-holder">
                <div class="row">
                    @foreach($portfolios as $portfolio)
                        <div class="col-md-3 col-sm-6 project-item mix {{ $portfolio->category_id }}">
                            <div class="thumb">
                                <div class="image">
                                        <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}">
                                </div>
                                <div class="hover-effect">
                                        <a href="{{ asset('storage/' . $portfolio->image) }}" data-lightbox="image-1"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>