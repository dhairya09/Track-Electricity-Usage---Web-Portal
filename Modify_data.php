<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php include("includes/header_update.php"); ?>


<div id="contents">
  <div id="blog" class="area">
    <div class="main">
      <ul class="list">
        <!--<li>-->
        <table class="dataPageTable" width="100%" height="100%">
        <td>
          <table class="dataPageTable" width="100%" height="100%">
            <th colspan="3"><strong style="font-size:26px;">Utility Service</strong></th><tr>
            <th colspan="3" style="line-height:12px"><i style="font-size:12px;">Buildings organized by Utility Service &amp; Feeder<br>
            Includes Peak Demand for each building</i></th></tr>
            <tr>
              <td align="center"><a href="upc_expandable.php" style="text-decoration:none"><font color="blue">UPC</font></a></td>
              <td align="center"><a href="hsc_expandable.php" style="text-decoration:none"><font color="green">HSC</font></a></td>
              <td align="center"><a href="vlg_expandable.php" style="text-decoration:none"><font size="7" color="red">Village</font></a></td>
            </tr>
            <tr>
              <td align="center"><a href="uof_expandable.php" style="text-decoration:none"><font size="6.5" color="blue">UPC-Off</font></a></td>
              <td align="center"><a href="hof_expandable.php" style="text-decoration:none"><font size="6.5" color="green">HSC-Off</font></a></td>
              <td align="center"><a href="oth_expandable.php" style="text-decoration:none"><font size="7" color="orange">Others</font></a></td>
            </tr>
          </table>
        </td>
        <td>
        <!--</li>-->
        <!-- closed <br>-->
         <!--<li>-->
          <table class="dataPageTable" width="100%" height="100%">
            <th colspan="3"><strong style="font-size:26px;">MV Distribution</strong></th><tr>
            <th colspan="3" style="line-height:12px"><i style="font-size:12px;">Buildings organized by Feeder (Primary &amp; Secondary)<br>
            Includes link to individual building info</i></th></tr>
            <tr>
              <td align="center"><a href="Modify_upc_mvdistribution.php" style="text-decoration:none"><font color="blue">UPC</font></a></td>
              <td align="center"><a href="Modify_hsc_mvdistribution.php" style="text-decoration:none"><font color="green">HSC</font></a></td>
              <td align="center"><a href="Modify_vlg_mvdistribution.php" style="text-decoration:none"><font size="7" color="red">Village</font></a></td>
            </tr>
            <tr>
              <td align="center"><a href="Modify_uof_mvdistribution.php" style="text-decoration:none"><font size="6.5" color="blue">UPC-Off</font></a></td>
              <td align="center"><a href="Modify_hof_mvdistribution.php" style="text-decoration:none"><font size="6.5" color="green">HSC-Off</font></a></td>
              <td align="center"><a href="Modify_oth_mvdistribution.php" style="text-decoration:none"><font size="7" color="orange">Others</font></a></td>
            </tr>
          </table>
          </td>
        <!--</li>-->
        </table>

        <br>

        <table class="dataPageTable" width="100%" height="100%">
        <td>
        <!--<li>-->
          <table class="dataPageTable" width="100%" height="100%">
            <th colspan="3"><strong style="font-size:26px;">Transformers Demand</strong></th><tr>
            <th colspan="3" style="line-height:12px"><i style="font-size:12px;">All buildings listed in alphabetically order with Primary &amp;
             Secondary feeders, transformer info, Peak kW<br>
            Traditional Transformer Demand Sheet</i></th></tr>
            <tr>
              <td align="center"><a href="Modify_upc_txdemand_show.php" style="text-decoration:none"><font color="blue">UPC</font></a></td>
              <td align="center"><a href="Modify_hsc_txdemand_show.php" style="text-decoration:none"><font color="green">HSC</font></a></td>
              <td align="center"><a href="Modify_vlg_txdemand_show.php" style="text-decoration:none"><font size="7" color="red">Village</font></a></td>
            </tr>
            <tr>
              <td align="center"><a href="Modify_uof_txdemand_show.php" style="text-decoration:none"><font size="6.5" color="blue">UPC-Off</font></a></td>
              <td align="center"><a href="Modify_hof_txdemand_show.php" style="text-decoration:none"><font size="6.5" color="green">HSC-Off</font></a></td>
              <td align="center"><a href="Modify_oth_txdemand_show.php" style="text-decoration:none"><font size="7" color="orange">Others</font></a></td>
            </tr>
          </table>
        <!--</li>-->
        <!-- closed <br> -->
        </td>
        <td>

        <!--<li>-->
          <table class="dataPageTable" width="100%" height="100%">
            <th colspan="3"><strong style="font-size:26px;">Generators</strong></th><tr>
            <th colspan="3" style="line-height:12px"><i style="font-size:12px;">All buildings listed in alphabetically order<br>
            Those buildings with generators includes all relevant info</i></th></tr>
            <tr>
              <td align="center"><a href="Modify_upc_generator_show.php" style="text-decoration:none"><font color="blue">UPC</font></a></td>
              <td align="center"><a href="Modify_hsc_generator_show.php" style="text-decoration:none"><font color="green">HSC</font></a></td>
              <td align="center"><a href="Modify_vlg_generator_show.php" style="text-decoration:none"><font size="7" color="red">Village</font></a></td>
            </tr>
            <tr>
              <td align="center"><a href="Modify_uof_generator_show.php" style="text-decoration:none"><font size="6.5" color="blue">UPC-Off</font></a></td>
              <td align="center"><a href="Modify_hof_generator_show.php" style="text-decoration:none"><font size="6.5" color="green">HSC-Off</font></a></td>
              <td align="center"><a href="Modify_oth_generator_show.php" style="text-decoration:none"><font size="7" color="orange">Others</font></a></td>
            </tr>
          </table>
        <!--</li>-->
        </td>
        </table>

        <br>
        <table class="dataPageTable" width="100%" height="100%">
                  <!--<li>-->
                  <td>
                    <table class="dataPageTable" width="100%" height="100%">
            <th colspan="3"><strong style="font-size:26px;">Services By Buildings</strong></th><tr>
            <th colspan="3" style="line-height:12px"><i style="font-size:12px;">All buildings listed in alphabetically order with Primary &amp;
             Secondary feeders and service fed from<br>
            Includes link to individual building info</i></th></tr>
            <tr>
              <td align="center"><a href="Modify_upc_service_by_building.php" style="text-decoration:none"><font color="blue">UPC</font></a></td>
              <td align="center"><a href="Modify_hsc_service_by_building.php" style="text-decoration:none"><font color="green">HSC</font></a></td>
              <td align="center"><a href="Modify_vlg_service_by_building.php" style="text-decoration:none"><font size="7" color="red">Village</font></a></td>
            </tr>
            <tr>
              <td align="center"><a href="Modify_uof_service_by_building.php" style="text-decoration:none"><font size="6.5" color="blue">UPC-Off</font></a></td>
              <td align="center"><a href="Modify_hof_service_by_building.php" style="text-decoration:none"><font size="6.5" color="green">HSC-Off</font></a></td>
              <td align="center"><a href="Modify_oth_service_by_building.php" style="text-decoration:none"><font size="7" color="orange">Others</font></a></td>
            </tr>
          </table>
        <!--</li>-->
        </td>
        <td>


        <!-- closed <br> -->
                  <!--<li>-->
                    <table class="dataPageTable" width="100%" height="100%">
            <th colspan="3"><strong style="font-size:26px;">Buildings By Priority</strong></th><tr>
            <th colspan="3" style="line-height:12px"><i style="font-size:12px;">Search Engine for buildings based on its Level<br>
            Includes link to individual building info</i></th></tr>
            <tr>
              <td align="center"><a href="upc_building_by_level.php" style="text-decoration:none"><font color="blue">UPC</font></a></td>
              <td align="center"><a href="hsc_building_by_level.php" style="text-decoration:none"><font color="green">HSC</font></a></td>
              <td align="center"><a href="vlg_building_by_level.php" style="text-decoration:none"><font size="7" color="red">Village</font></a></td>
            </tr>
            <tr>
              <td align="center"><a href="uof_building_by_level.php" style="text-decoration:none"><font size="6.5" color="blue">UPC-Off</font></a></td>
              <td align="center"><a href="hof_building_by_level.php" style="text-decoration:none"><font size="6.5" color="green">HSC-Off</font></a></td>
              <td align="center"><a href="oth_building_by_level.php" style="text-decoration:none"><font size="7" color="orange">Others</font></a></td>
            </tr>
          </table>
        <!--</li>-->
        </td>
        </table>


        <br>

        <table class="dataPageTable" width="100%" height="100%">
          <th colspan="3"><strong style="font-size:26px;">Buildings Affected By:</strong></th><tr>
          <th colspan="3" style="line-height:12px"><i style="font-size:12px;">Search Engine for finding any buildings affected by:</i></th>
          <tr>
            <td align="center"><a href="usc_affected_by_manhole_show.php" style="text-decoration:none"><font color="black">Manhole</font></a></td>
            <td align="center"><a href="usc_affected_by_feeder_show.php" style="text-decoration:none"><font color="black">Feeder</font></a></td>
            <td align="center"><a href="usc_affected_by_service_show.php" style="text-decoration:none"><font color="black">Service</font></a></td>
          </tr>
        </table>

        <br>
        <table class="dataPageTable" width="100%" height="100%">
        <td>
          <table class="dataPageTable" width="100%" height="100%">
            <th colspan="3"><strong style="font-size:26px;">Services</strong></th><tr>
            <th colspan="3" style="line-height:12px"><i style="font-size:12px;">List of Feeders &amp; Services they are fed from</i></th></tr>
            <tr>
              <td align="center"><a href="Modify_upc_service_show.php" style="text-decoration:none"><font color="blue">UPC</font></a></td>
              <td align="center"><a href="Modify_hsc_service_show.php" style="text-decoration:none"><font color="green">HSC</font></a></td>
              <td align="center"><a href="Modify_vlg_service_show.php" style="text-decoration:none"><font size="7" color="red">Village</font></a></td>
            </tr>
            <tr>
              <td align="center"><a href="Modify_uof_service_show.php" style="text-decoration:none"><font size="6.5" color="blue">UPC-Off</font></a></td>
              <td align="center"><a href="Modify_hof_service_show.php" style="text-decoration:none"><font size="6.5" color="green">HSC-Off</font></a></td>
              <td align="center"><a href="Modify_oth_service_show.php" style="text-decoration:none"><font size="7" color="orange">Others</font></a></td>
            </tr>
          </table>
        </td>
        <td>
          <table class="dataPageTable" width="100%" height="100%">
            <th colspan="3"><strong style="font-size:26px;">Meters</strong></th><tr>
            <th colspan="3" style="line-height:12px"><i style="font-size:12px;">List of Meters &amp; Details</i></th></tr>
            <tr>
              <td align="center"><a href="Modify_usc_ismeters_show.php" style="text-decoration:none"><font size="7" color="blue">IS</font></a></td>
              <td align="center"><a href="Modify_usc_ladwp_meters_show.php" style="text-decoration:none"><font size="7" color="green">LADWP</font></a></td>
              <td align="center"><a href="#" style="text-decoration:none"><font size="7" color="red">?</font></a></td>
            </tr>
            <tr>
              <td align="center"><a href="#" style="text-decoration:none"><font size="7" color="blue">?</font></a></td>
              <td align="center"><a href="#" style="text-decoration:none"><font size="7" color="green">?</font></a></td>
              <td align="center"><a href="#" style="text-decoration:none"><font size="7" color="orange">?</font></a></td>
            </tr>
          </table>
        </td>
        </table>


        <!--
        <li>
          <img src="images/upc_buildings.jpg" alt="Img" width="130" height="130" title="UPC Buildings" />
          <div>
            <h3>Buildings</h3>
            <p>
                          This displays the data about Buildings
            </p>
            <a href="upc_buildings_show.php">
            <h2>UPC</h2></a>
          <p><h2>HSC</h2></p>
                      </div>
        </li>

        <li>
          <img src="images/upc_feeder.jpg" alt="Img" width="130" height="130" title="UPC Feeders" />
          <div>
            <h3>Feeders</h3>
            <p>
                          This displays the data about Feeders for UPC
            </p>
            <a href="upc_feeders_show.php">
            <h2>UPC</h2></a>
          <p><h2>HSC</h2></p>
          </div>
        </li>



              <li>
                  <a href="admin_db_access.php">
          <img src="images/db_access.jpg" alt="Img" height="130" width="130" />
                      </a>
          <div>
            <h3>Admin User SQL Access</h3>
            <p>
                          This lets you query from DB directly
            </p>
            <h2>UPC</h2>
          <p><h2>HSC</h2></p>

            </div>
        </li>
        -->
      </ul>
      <!--
      <div class="pagination">
        <ul>
          <li>
            <a href="blog.html">First</a>
          </li>
          <li class="selected">
            <a href="blog.html">1</a>
          </li>
          <li>
            <a href="blog.html">2</a>
          </li>
          <li>
            <a href="blog.html">3</a>
          </li>
          <li>
            <a href="blog.html">4</a>
          </li>
          <li>
            <a href="blog.html">5</a>
          </li>
          <li>
            <a href="blog.html">6</a>
          </li>
          <li>
            <a href="blog.html">7</a>
          </li>
          <li>
            <a href="blog.html">8</a>
          </li>
          <li>
            <a href="blog.html">9</a>
          </li>
          <li>
            <a href="blog.html">10</a>
          </li>
          <li class="last">
            <a href="blog.html">Last</a>
          </li>
        </ul>
      </div>
      -->
    </div>
    <!--
    <div class="sidebar">
      <h2 class="heading1">Archive</h2>
      <div class="box2">
        <div>
          <ul class="archives">
            <li class="selected">
              <span>2023</span>
              <ul>
                <li>
                  <a href="blog.html">December</a>
                </li>
                <li>
                  <a href="blog.html">November</a>
                </li>
                <li>
                  <a href="blog.html">October</a>
                </li>
                <li>
                  <a href="blog.html">September</a>
                </li>
                <li>
                  <a href="blog.html">August</a>
                </li>
                <li>
                  <a href="blog.html">July</a>
                </li>
                <li>
                  <a href="blog.html">June</a>
                </li>
                <li>
                  <a href="blog.html">May</a>
                </li>
                <li>
                  <a href="blog.html">April</a>
                </li>
                <li>
                  <a href="blog.html">March</a>
                </li>
                <li>
                  <a href="blog.html">Febuary</a>
                </li>
                <li>
                  <a href="blog.html">Janruary</a>
                </li>
              </ul>
            </li>
            <li>
              <span>2023</span>
            </li>
            <li>
              <span>2023</span>
            </li>
            <li>
              <span>2023</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
    -->
        <span class="sidebar"><a class="heading1" href="Modify_upc_update_data_ups.php">UPS</a></span>



        <span class="sidebar"><a class="heading1" href="Modify_upc_update_data_keylocks.php">Key Interlocks</a></span>



        <span class="sidebar"><a class="heading1" href="Modify_upc_update_data_qce.php">Quick Connect Equipment </a></span>



        <span class="sidebar"><a class="heading1" href="Modify_upc_update_data_camlocks.php">Cam Locks</a></span>



        <span class="sidebar"><a class="heading1" href="Modify_upc_update_data_mambreak.php">Mam Breakers</a><span>







  </div>


        <!--
        <h2 class="heading1"><a href="../dataUpdate/upc_update_data.php">Admin Panel</a></h2>
        -->
      <div class="sidebar">
        <h2 class="heading1"><a href="Modify_upc_update_data.php">Admin Panel</a></h2>
        <!--
        <h2 class="heading1"><a href="txdemand_update_data.php">Peak Demand</a></h2>
        -->
        <h2 class="heading1"><a href="">Peak Demand</a></h2>
      </div>


</div>

<?php include("includes/footer.php"); ?>
