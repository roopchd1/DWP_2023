
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
            <ul class="navbar-nav me-auto text-center">                    
                    <?php
                    $offerManager = new OfferManager($connection);
                    $offerManager->getDailyOffers();
                  ?>
            </ul>

            
            <div class="row">
    <?php
    // Check if the user is logged in
    if (isset($_SESSION['username'])) {
      echo '<h5 class="text-light text-center bg-primary p-2 mb-3">This might interest you too !!</h5>';  
      // Create an instance of the RecommendationSystem class
        $recommendationSystem = new RecommendationSystem($connection);

        // Display recommendations for the 'Women Bags' category
        $recommendationSystem->getRecommendations('Women Bags');
    }
    ?>
            </div>
 </div>