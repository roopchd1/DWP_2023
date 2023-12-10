<div class="col-md-2 p-0">
            
            <!-- category list -->

            <ul class="navbar-nav me-auto text-center mb-5">
              <li class="nav-item bg-primary">
                <a href="#" class="nav-link text-light"><h5>Shop Categories</h5></a>
              </li>
                      <?php
                        getcategory();
                      ?>
            </ul>

              <!-- brand list -->

            <ul class="navbar-nav me-auto text-center mt-5">
                    <li class="nav-item bg-primary">
                      <a href="#" class="nav-link text-light"><h5>Branded Bags</h5></a>
                    </li>

                    <?php
                    getbrand();
                  ?>
            </ul>

            <!-- daily offers -->
            <?php getDailyOffers(); ?>
          </div>