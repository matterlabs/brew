<?php   /*
		mysql_select_db($database_brewing, $brewing);
		$query_styles_filter = sprintf("SELECT * FROM styles ORDER BY brewStyleGroup,brewStyleNum);
		$styles_filter = mysql_query($query_styles_filter, $brewing) or die(mysql_error());
		$row_styles_filter = mysql_fetch_assoc($styles_filter);
		$totalRows_styles_filter = mysql_num_rows($styles_filter);
		*/
		?>
		<div id="content-wide">
        <?php 
		 
		if ($totalRows_log == 0) { 
		?>
		<table class="dataTable">
            <tr>
			<td class="dataHeadingList">There are currently no BrewBlogs in the database<?php if ($filter != "all") echo " for this member"; ?>.<br><br></td>
			</tr>
		</table>
		</div>
		<?php } else { ?>
        <?php if ($totalRows_featured > 0)  {  if (($row_pref['mode'] == "1") ||  (($row_pref['mode'] == "2") && ($filter == "all"))) include ('featured.inc.php'); } ?>
		<?php if ($totalRows_featured > 0) { if (($row_pref['mode'] == "1") ||  (($row_pref['mode'] == "2") && ($filter == "all"))) { ?><div class="headerContentAdmin">All <?php echo $dbName; ?></div><?php } } ?> 
		<table class="dataTable">
        	<tr>
            <?php if ($style != "all") { ?>
              <td><div id="breadcrumb">Filter: <?php echo $row_log['brewStyle'];?> | <a href="<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']."?page=".$page."&filter=".$filter."&style=all&sort=".$sort."&dir=".$dir."&view=".$view."&pg=".$pg; ?>">See all styles <?php if (($row_pref['mode'] == "2")&& ($filter != "all")) echo "brewed by ".$row_user2['realFirstName']; ?></a></div></td>
            <?php } ?>
			  <td><div id="paginate"><?php echo $total." ".$row_pref['menuBrewBlogs']." Total"; if ($total > $display) echo "&nbsp;&nbsp;&nbsp;&#8226"; if ($view == "all") echo "&nbsp;&nbsp;&nbsp;&#8226;&nbsp;&nbsp;&nbsp;"; if ($total > $display) { echo "&nbsp;&nbsp;&nbsp;"; paginate($display, $pg, $total);  if ($view == "limited") { ?>&nbsp;&nbsp;&nbsp;&#8226&nbsp;&nbsp;&nbsp;<a href="?page=<?php echo $page; ?>&sort=<?php echo $sort; ?>&dir=<?php echo $dir; ?>&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=all">Entire List of <?php if (($row_pref['mode'] == "2") && ($filter != "all")) echo $row_user2['realFirstName']."'s "; echo $row_pref['menuBrewBlogs']; ?></a><?php } } if  (($view == "all") && ($total < $display)) { ?><a href="?page=<?php echo $page; ?>&sort=<?php echo $sort; ?>&dir=<?php echo $dir; ?>&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=limited">Limited List of <?php if (($row_pref['mode'] == "2")&& ($filter != "all")) echo $row_user2['realFirstName']."'s "; echo $row_pref['menuBrewBlogs']; ?></a><?php } ?></div></td>
			</tr>
        </table>
        <table class="dataTable">
            <tr>
            <?php if (isset($_SESSION["loginUsername"])) echo "<td class=\"dataList\" width=\"1%\"><img src=\"".$imageSrc."pencil.png\" border=\"0\" align=\"absmiddle\"></td>"; ?>
              <?php if (!checkmobile()) { ?><td class="dataHeadingList" width="1%">XML</td><?php } ?>
              <td class="dataHeadingList" width="25%"><?php echo $dbName; ?><?php if (!checkmobile()) { ?>&nbsp;<a href="?page=<?php echo $page; ?>&sort=brewName&dir=ASC&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_up.gif" border="0" alt="Sort Ascending"></a><a href="?page=<?php echo $page; ?>&sort=brewName&dir=DESC&filter=<?php echo $filter; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_down.gif" border="0" alt="Sort Descending"></a><?php } ?></td>
              <td class="dataHeadingList" width="10%">Date<?php if (!checkmobile()) { ?>&nbsp;<a href="<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']; ?>?page=<?php echo $page; ?>&sort=brewDate&dir=ASC&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_up.gif" border="0" alt="Sort Ascending"></a><a href="?page=<?php echo $page; ?>&sort=brewDate&dir=DESC&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_down.gif" border="0" alt="Sort Descending"></a><?php } ?></td>
              <td class="dataHeadingList" width="25%">Style<?php if (!checkmobile()) { ?>&nbsp;<a href="?page=<?php echo $page; ?>&sort=brewStyle&dir=ASC&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_up.gif" border="0" alt="Sort Ascending"></a><a href="?page=<?php echo $page; ?>&sort=brewStyle&dir=DESC&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_down.gif" border="0" alt="Sort Descending"></a><?php } ?></td>
              <td class="dataHeadingList" width="10%">Method<?php if (!checkmobile()) { ?>&nbsp;<a href="?page=<?php echo $page; ?>&sort=brewMethod&dir=ASC&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_up.gif" border="0" alt="Sort Ascending"></a><a href="?page=<?php echo $page; ?>&sort=brewMethod&dir=DESC&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_down.gif" border="0" alt="Sort Descending"></a><?php } ?></td>

<td class="dataHeadingList" width="10%"><?php if ($row_pref['measColor'] == "EBC") echo "EBC"; else echo "SRM"; ?><?php if (!checkmobile()) { ?>&nbsp;<a href="?page=<?php echo $page; ?>&sort=brewLovibond&dir=ASC&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_up.gif" border="0" alt="Sort Ascending"></a><a href="?page=<?php echo $page; ?>&sort=brewLovibond&dir=DESC&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_down.gif" border="0" alt="Sort Descending"></a><?php } ?></td>

<?php /*
<!--              <td class="dataHeadingList" width="10%"><?php if ($row_pref['measColor'] == "EBC") echo "EBC"; else echo "SRM"; ?>/<?php if ($row_pref['measColor'] == "EBC") echo "SRM"; else echo "EBC"; if (!checkmobile()) { ?>&nbsp;<a href="?page=<?php echo $page; ?>&sort=brewLovibond&dir=ASC&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_up.gif" border="0" alt="Sort Ascending"></a><a href="?page=<?php echo $page; ?>&sort=brewLovibond&dir=DESC&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_down.gif" border="0" alt="Sort Descending"></a><?php } ?></td>
      */?>

              <td class="dataHeadingList" width="5%">IBU<?php if (!checkmobile()) { ?>&nbsp;<a href="?page=<?php echo $page; ?>&sort=brewBitterness&dir=ASC&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_up.gif" border="0" alt="Sort Ascending"></a><a href="?page=<?php echo $page; ?>&sort=brewBitterness&dir=DESC&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_down.gif" border="0" alt="Sort Descending"></a><?php } ?></td>
              <td class="dataHeadingList" width="5%">ABV<?php if (!checkmobile()) { ?>&nbsp;<a href="?page=<?php echo $page; ?>&sort=brewOG&dir=ASC&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_up.gif" border="0" alt="Sort Ascending"></a><a href="?page=<?php echo $page; ?>&sort=brewOG&dir=DESC&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_down.gif" border="0" alt="Sort Descending"></a><?php } ?></td>
			  <?php if (($row_pref['mode'] == "2") && ($filter == "all")) { ?><td class="dataHeadingList">Contributor<?php if (!checkmobile()) { ?>&nbsp;<a href="?page=<?php echo $page; ?>&sort=brewBrewerID&dir=ASC&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_up.gif" border="0" alt="Sort Ascending"></a><a href="?page=<?php echo $page; ?>&sort=brewBrewerID&dir=DESC&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=<?php echo $view; ?>"><img src="<?php echo $imageSrc; ?>sort_down.gif" border="0" alt="Sort Descending"></a><?php } ?></td><?php } ?>
              <td class="dataHeadingList center" width="1%"><img src="<?php echo $imageSrc; ?>medal_gold_3.png" border="0" alt="Awards/Competition Entires" align="baseline"></td>
			</tr>
            <?php do { if ($row_log['brewArchive'] != "Y") { ?>
			<?php 
			// Get brew style information for all listed styles
			mysql_select_db($database_brewing, $brewing);
			$query_styles = sprintf("SELECT * FROM styles WHERE brewStyle='%s'", $row_log['brewStyle']);
			$styles = mysql_query($query_styles, $brewing) or die(mysql_error());
			$row_styles = mysql_fetch_assoc($styles);
			$totalRows_styles = mysql_num_rows($styles);
			
			// Get real user names
			mysql_select_db($database_brewing, $brewing);
			$query_user2 = sprintf("SELECT * FROM users WHERE user_name = '%s'", $row_log['brewBrewerID']);
			$user2 = mysql_query($query_user2, $brewing) or die(mysql_error());
			$row_user2 = mysql_fetch_assoc($user2);
			$totalRows_user2 = mysql_num_rows($user2);
			
			// Awards
			$awardNewID = "b".$row_log['id'];
			mysql_select_db($database_brewing, $brewing);
			$query_awards2 = sprintf("SELECT * FROM awards WHERE awardBrewID='%s'", $awardNewID);
			$awards2 = mysql_query($query_awards2, $brewing) or die(mysql_error());
			$row_awards2 = mysql_fetch_assoc($awards2);
			$totalRows_awards2 = mysql_num_rows($awards2);
			?>
            <tr <?php echo "style=\"background-color:$color\""; ?>>
            <?php if (isset($_SESSION["loginUsername"])) { if (($row_user['userLevel'] == "1") || ($row_log['brewBrewerID'] == $loginUsername)) echo "<td class=\"dataList\"><a href=\"admin/index.php?action=edit&dbTable=brewing&id=".$row_log['id']."\"><img src=\"".$imageSrc."pencil.png\" alt=\"Edit ".$row_log['brewName']."\" title=\"Edit ".$row_log['brewName']."\" border=\"0\" align=\"absmiddle\"></a></td>"; else echo "<td>&nbsp;</td>"; } ?>
              <?php if (!checkmobile()) { ?><td class="dataList"><a href="#" onclick="window.open(INCLUDES.'output_beer_xml.inc.php?id=<?php echo $row_log['id']; ?>&source=<?php echo $source; ?>&brewStyle=<?php echo $row_log['brewStyle']; ?>','','height=1,width=1, scrollbars=no, toolbar=no, resizable==no, menubar=no'); return false;"><img src="<?php echo $imageSrc; ?>page_white_code.png" title="Download BeerXML" align="absmiddle" border="0" /></a><?php } ?>
              <td class="dataList"><a href="index.php?page=<?php echo $destination; ?>&filter=<?php echo $row_log['brewBrewerID']; ?>&id=<?php echo $row_log['id']; ?>"><?php echo $row_log['brewName']; ?></a></td>
              <td class="dataList" nowrap="nowrap"><?php $date = $row_log['brewDate']; $realdate = dateconvert($date,3); echo $realdate; ?></td>
			  <td class="dataList">
			  <div id="moreInfo"><?php if (($totalRows_styles > 0) && (!checkmobile())) { ?><a href="<?php if ($style == "all") echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']."?page=".$page."&filter=".$filter."&style=".$row_log['brewStyle']."&sort=".$sort."&dir=".$dir."&view=".$view."&pg=1"; else echo "#"; ?>" title="Filter by style: <?php echo $row_log['brewStyle']; ?>"><?php } echo $row_log['brewStyle']; if (($totalRows_styles > 0) && (!checkmobile())) { ?>
			  <span>
			  <div id="wideWrapper">
			  <?php include ('reference/styles.inc.php'); ?>
			  </div>
			  </span>
			  </a>
              <?php } ?>
			  </div>
			  </td>
              <td class="dataList"><?php if ($row_log['brewMethod'] != "") { echo $row_log['brewMethod']; } else echo "&nbsp;" ?></td>
              <?php if (!checkmobile()) { ?>
              <td class="dataList">
			  		<?php if ($row_log['brewLovibond'] != "") { ?>
					<?php //include (INCLUDES.'color.inc.php'); ?>
					<?php include (INCLUDES.'color_display.inc.php'); ?>
				   	<?php } else echo "&nbsp;"; ?>
			  </td>
			  <?php } ?>
              <td class="dataList"><?php if ($row_log['brewBitterness'] != "") { echo round ($row_log['brewBitterness'], 1); } else echo "&nbsp;" ?></td>
              <td class="dataList"><?php if (($row_log['brewOG'] != "") && ($row_log['brewFG'] != "")) { include (INCLUDES.'abv.inc.php'); echo round ($abv, 1)."%"; } else echo "&nbsp;"; ?></td>
              <?php if (($row_pref['mode'] == "2") && ($filter == "all")) { ?><td  class="dataList"><a href="?page=<?php echo $page; ?>&sort=<?php echo $sort; ?>&dir=<?php echo $dir; ?>&filter=<?php echo $row_user2['user_name']; ?>&view=limited"><?php echo $row_user2['realFirstName']."&nbsp;".$row_user2['realLastName']; ?></a></td><?php } ?>
              <td class="dataList center"><?php if ($totalRows_awards2 > 0) echo $totalRows_awards2; else echo "&nbsp;"; ?></td>
            </tr>
            <?php if ($color == $color1) { $color = $color2; } else { $color = $color1; } ?>
            <?php }   // end if ($row_log['brewArchive'] != "Y")
			} while ($row_log = mysql_fetch_assoc($log)); ?>		
          </table>
          	<?php if ($totalRows_log > 10) { ?>
          	<table class="dataTable">
        		<tr>
			  		<td colspan="9"><div id="paginate"><?php echo $total." ".$row_pref['menuBrewBlogs']." Total"; if ($total > $display) echo "&nbsp;&nbsp;&nbsp;&#8226"; if ($view == "all") echo "&nbsp;&nbsp;&nbsp;&#8226;&nbsp;&nbsp;&nbsp;"; if ($total > $display) { echo "&nbsp;&nbsp;&nbsp;"; paginate($display, $pg, $total);  if ($view == "limited") { ?>&nbsp;&nbsp;&nbsp;&#8226&nbsp;&nbsp;&nbsp;<a href="?page=<?php echo $page; ?>&sort=<?php echo $sort; ?>&dir=<?php echo $dir; ?>&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=all">Entire List of <?php if (($row_pref['mode'] == "2") && ($filter != "all")) echo $row_user2['realFirstName']."'s "; echo $row_pref['menuBrewBlogs']; ?></a><?php } } if  ($view == "all") { ?><a href="?page=<?php echo $page; ?>&sort=<?php echo $sort; ?>&dir=<?php echo $dir; ?>&filter=<?php echo $filter; ?>&style=<?php echo $style; ?>&view=limited">Limited List of <?php if (($row_pref['mode'] == "2")&& ($filter != "all")) echo $row_user2['realFirstName']."'s "; echo $row_pref['menuBrewBlogs']; ?></a><?php } ?></div></td>
				</tr>
        	</table>
        	<?php } ?>
		  </div>
		<?php } ?>