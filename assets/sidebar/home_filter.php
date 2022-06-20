<div class="home-filter hide-on-mobile-tablet">
    <!-- <span class="home-filter__label">Sort</span> -->
    <button onclick="test();" class="home-filter__btn btn home-filter__btn--active"><a href="./index.php" class="select-input__link select-input__link--active">Tất cả sản phẩm</a></button>
    <button class="home-filter__btn btn"><a href="./index.php?action=best" class="select-input__link">Bán chạy nhất</a></button>

    <div class="select-input">
        <span class="select-input__label">Lọc sản phẩm </span> &nbsp;
        <i class="select-input__icon fas fa-chevron-down"></i>

        <ul class="select-input__list">
            <li class="select-input__item">
                <a href="./index.php?action=TT" class="select-input__link">Truyện tranh</a>
            </li>
            <li class="select-input__item">
                <a href="./index.php?action=SGK" class="select-input__link">Sách giáo khoa</a>
            </li>
            <li class="select-input__item">
                <a href="./index.php?action=low" class="select-input__link">Giá từ thấp đến cao</a>
            </li>
            <li class="select-input__item">
                <a href="./index.php?action=high" class="select-input__link">Giá từ cao đến thấp</a>
            </li>

        </ul>
    </div>

    <div class="home-filter__page">
        <span class="home-filter__page-number">
            <span class="home-filter__page-current">1</span>/1
        </span>
    </div>

    <div class="home-filter__page-control">
        <a href="" class="home-filter__page-btn home-filter__page-btn-disable">
            <i class="home-filter__page-icon fas fa-chevron-left"></i>
        </a>
        <a href="" class="home-filter__page-btn">
            <i class="home-filter__page-icon fas fa-chevron-right"></i>
        </a>
    </div>
</div>