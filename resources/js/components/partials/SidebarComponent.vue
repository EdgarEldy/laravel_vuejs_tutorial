<template>
  <div>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
      <ul class="nav menu">
        <li class="active">
          <router-link to="/"
            ><svg class="glyph stroked dashboard-dial">
              <use xlink:href="#stroked-dashboard-dial"></use>
            </svg>
            Home
          </router-link>
        </li>
        <li>
          <a href=""
            ><svg class="glyph stroked calendar">
              <use xlink:href="#stroked-calendar"></use>
            </svg>
            Orders</a
          >
        </li>
        <li>
          <router-link to="/customers"
            ><svg class="glyph stroked clock">
              <use xlink:href="#stroked-clock"></use>
            </svg>
            Customers
          </router-link>
        </li>
        <li class="parent">
          <a href="#">
            <span data-toggle="collapse" href="#sub-item-1"
              ><svg class="glyph stroked chevron-down">
                <use xlink:href="#stroked-chevron-down"></use></svg
            ></span>
            Products
          </a>
          <ul class="children collapse" id="sub-item-1">
            <li>
              <router-link to="/products">
                <svg class="glyph stroked chevron-right">
                  <use xlink:href="#stroked-chevron-right"></use>
                </svg>
                All products
              </router-link>
            </li>
            <li>
              <router-link to="/categories"
                ><svg class="glyph stroked clock">
                  <use xlink:href="#stroked-clock"></use>
                </svg>
                Categories
              </router-link>
            </li>
          </ul>
        </li>
        <li class="parent">
          <a href="#">
            <span data-toggle="collapse" href="#sub-item-2"
              ><svg class="glyph stroked chevron-down">
                <use xlink:href="#stroked-chevron-down"></use></svg
            ></span>
            Access control
          </a>
          <ul class="children collapse" id="sub-item-2">
            <li>
              <a class="" href="#">
                <svg class="glyph stroked chevron-right">
                  <use xlink:href="#stroked-chevron-right"></use>
                </svg>
                Roles
              </a>
            </li>
            <li>
              <a class="" href="#">
                <svg class="glyph stroked chevron-right">
                  <use xlink:href="#stroked-chevron-right"></use>
                </svg>
                Users
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#">
            <svg class="glyph stroked male-user">
              <use xlink:href="#stroked-cancel"></use>
            </svg>
            Logout</a
          >
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {};
</script>
