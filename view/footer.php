 </main>
 <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
              </div>
              <div id="debug" class="col l4 offset-l2 s12">
                <h5 class="white-text">Debug</h5>
                <p>
                  <?php
                  // dumps with arrays
                    // var_dump($_SESSION);

                  // dumps clean variables
                  foreach ($_SESSION as $key=>$val)
                  echo $key." : ".$val."<br/>";
                  ?>
                </p>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="luv container">
             <a href="http://chloechantelle.com" target="_blank" >made w/ love by coco ©</a>
            <!-- <a class="luv right" href="#!">Another Link</a> -->
            </div>
          </div>
        </footer>

</body>
</html>