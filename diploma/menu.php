<?php 
  include 'connect.php';
  $test=mysql_query("SELECT * FROM kitablar");
  $id=0;
  while ($t=mysql_fetch_array($test)) {
    $id=$t["id"];
    # code...
  }
  $select=mysql_fetch_array(mysql_query("SELECT * FROM kitablar WHERE id=$id"))
 ?>
					<div class="col-lg-3">
						<!-- Dinamic Section -->
						<section class="dinamic">
							<div class="news"><p class="enn">Ən yeni kitabımız</p><hr style="height: 2px; background-color: #86bc42 ;"><br>
              <div class="newsBook">
                  <?php 
    echo "<div class='newsBook'>
    <p class='bookname'><img src='".$select['kitabin_uz_qabigi']."'><a href='bookview.php?id=".$select['id']."'>".$select['kitabin_adi']."</a></p><br>
    </div>";
   ?>
              </div>
              </div>
						</section>
					</div>	
				</div>
			</div>
		</section>
