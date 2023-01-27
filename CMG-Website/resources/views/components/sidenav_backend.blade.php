<a class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><box-icon name='menu' color='white'></box-icon></a>

<div class="offcanvas offcanvas-start" style="width: 300px;" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
  <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <span class="fs-4">Backend</span>
    </a>
  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
<!-- Start Body -->

    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
        <a data-toggle="tooltip" data-placement="right" title="รูปภาพสไลด์ในหน้าแรก" href="{{ request()->routeIs('backend.carousel.index') ? '#' : route('backend.carousel.index') }}" class="nav-link {{ request()->routeIs('backend.carousel.index') ? 'active' : 'link-dark'}}" aria-current="page">
        Carousel
        </a>
    </li>
    <li>
        <a data-toggle="tooltip" data-placement="right" title="หมวดหมู่ทั้งหมด" href="{{ request()->routeIs('backend.category.index') ? '#' : route('backend.category.index') }}" class="nav-link {{ request()->routeIs('backend.category.index') ? 'active' : 'link-dark'}}" aria-current="page">
        Category
        </a>
    </li>
    <li>
        <a data-toggle="tooltip" data-placement="right" title="ตำแหน่งงานทั้งหมด" href="{{ request()->routeIs('backend.employee.index') ? '#' : route('backend.employee.index') }}" class="nav-link {{ request()->routeIs('backend.employee.index') ? 'active' : 'link-dark'}}" aria-current="page">
            Employee
        </a>
    </li>
    <li>
        <a data-toggle="tooltip" data-placement="right" title="รูปภาพทั้งหมดในแกลเลอรี่" href="{{ request()->routeIs('backend.gallery.index') ? '#' : route('backend.gallery.index') }}" class="nav-link {{ request()->routeIs('backend.gallery.index') ? 'active' : 'link-dark'}}" aria-current="page">
            Gallery
        </a>
    </li>
    <li>
        <a data-toggle="tooltip" data-placement="right" title="รวมสถิติ Manhour" href="{{ request()->routeIs('backend.manhours.index') ? '#' : route('backend.manhours.index') }}" class="nav-link {{ request()->routeIs('backend.manhours.index') ? 'active' : 'link-dark'}}" aria-current="page">
            Manhours
        </a>
    </li>
        <li>
        <a data-toggle="tooltip" data-placement="right" title="หมวดหมู่รองทั้งหมด" href="{{ request()->routeIs('backend.subcategory.index') ? '#' : route('backend.subcategory.index') }}" class="nav-link {{ request()->routeIs('backend.subcategory.index') ? 'active' : 'link-dark'}}" aria-current="page">
            Subcategory
        </a>
    </li>
        <li>
        <a data-toggle="tooltip" data-placement="right" title="อุปกรณ์ทั้งหมด" href="{{ request()->routeIs('backend.supply.index') ? '#' : route('backend.supply.index') }}" class="nav-link {{ request()->routeIs('backend.supply.index') ? 'active' : 'link-dark'}}" aria-current="page">
            Supply
        </a>
    </li>
        <li>
        <a data-toggle="tooltip" data-placement="right" title="บริษัทผู้จัดจำหน่ายทั้งหมด" href="{{ request()->routeIs('backend.vendor.index') ? '#' : route('backend.vendor.index') }}" class="nav-link {{ request()->routeIs('backend.vendor.index') ? 'active' : 'link-dark'}}" aria-current="page">
            Vendor
        </a>
    </li>
    </ul>
    <hr>
    <a role="button" class="btn btn-danger" href="{{ url('/logout') }}">Logout</a>
<!-- end body -->
  </div>
</div>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
<style>
ul li:hover {
border-radius: 6px;
background-color: rgba(141, 141, 141, 0.5);
}
</style>
