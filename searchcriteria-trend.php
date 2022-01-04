		<section class="search-results-top">
			<div class="element-container row">
				<div class="search-container">
                      <div class="home-search-header variant2">
                                     <h1><?=getOrCreateCustomTitle( ucwords( $searchsubtype ) . " Search3: ". strtoupper( getSearchTrendName( $search[comparisonaspect] ) ), ucwords( $searchsubtype ) . " Search: " . getSearchTrendName( $search[comparisonaspect] ) )?></h1>
                                <div class="cf"></div>
                            </div>
					<div class="search-body">
                        
                      
						<h1><a class="expand-btn " href="#">Search Criteria</a></h1>
						<div id="search-hidden" class="hide">
							<table width="100%" id="search-criteria-table">
    <?php
?>

<?php
    $tmpurl = "trend-search-results.php?" . urldecode( $_SERVER['QUERY_STRING'] );
$tmpurl = str_replace( "&search[comparisonaspect]=". $search[comparisonaspect] , "", $tmpurl );
$tmpurl .= "&search[comparisonaspect]=";

    ?>
								<tr>
									<td class="search-column-1">
    Search Focus: 
</td>									<td class="search-column-2">
 								<select name="search[comparisonaspect]" style="width:400px" onChange='document.location.href="<?=$tmpurl?>" + this.options[this.selectedIndex].value' >
    <? 

$poss = getMyPossibleSearchFunctions( $searchsubtype );

foreach( $poss as $pid=>$displ ) { 

?>
      <option <?=$search[comparisonaspect] == $pid?"SELECTED":""?> value="<?=$pid?>"><?=$displ?></option>
                                                              <? } ?>
								</select>
</td></tr>

<? if( isset( $searchclientid ) ) { 
    $tmpurl = "trend-search-results.php?" . urldecode( $_SERVER['QUERY_STRING'] );
$tmpurl = str_replace( "searchclientid={$searchclientid}", "", $tmpurl );
$tmpurl .= "&searchclientid=";
?>
								<tr>
									<td class="search-column-1">
									Client:
</td>									<td class="search-column-2">

 								<select name="searchclientid" style="width:200px" onChange='document.location.href="<?=$tmpurl?>" + escape( this.options[this.selectedIndex].value )' >
								<option value="">Do Not Use</option>
<? 
outputSelectValues( getClients(), $searchclientid ); ?>

								</select>
</td></tr>

<? } ?>
    <? if( !$nodates ){  ?>
								<tr>
									<td class="search-column-1">

                         Dates: 
</td>									<td class="search-column-2">

<? if( $doingyearlysearch ) { ?>

                               <?=$search[dates][fromyear]?>
                         <? if( $search[dates][toyear] ) { ?>
                                                        to <?=$search["dates"]["specialendq"]?"Q" . $search["dates"]["specialendq"]:""?> <?=$search[dates][toyear]?>
                                                        <? } ?>
<? } else if( $doingweeklysearch ) { ?>

<?=$rangedisplay?>

<? } else { ?>
                               Q<?=$search[dates][fromq]?>/<?=$search[dates][fromy]?>
                         <? if( $search[dates][toq] ) { ?>
                                                        to Q<?=$search[dates][toq]?>/<?=$search[dates][toy]?>
                                                        <? } ?>
<? } ?>
</td></tr>
                         <? } else { ?>
								<tr>
									<td class="search-column-1">
Dates:
</td>									<td class="search-column-2">
All Dates
</td></tr>
    <? } ?>




    <?php
    $tmpurl = "trend-search-results.php?" . urldecode( $_SERVER['QUERY_STRING'] );
$tmpurl = str_replace( "&search[peakchart]=". $search[peakchart] , "", $tmpurl );
$tmpurl .= "&search[peakchart]=";

    ?>
								<tr>
									<td class="search-column-1">
<?=getPeakPositionDisplayName($search[peakchart] )?>
</td>									<td class="search-column-2">

 								<select name="search[peakchart]" style="width:400px" onChange='document.location.href="<?=$tmpurl?>" + this.options[this.selectedIndex].value' >
									<option value="">Any</option>
    <? 

$poss = getMyPossibleSearchFunctions( $searchsubtype );

outputSelectValues( $peakvalues, $search["peakchart"] );

?>
								</select>

</td></tr>

<? 
    $tmpurl = "trend-search-results.php?" . urldecode( $_SERVER['QUERY_STRING'] );
$tmpurl = str_replace( "search[minweeks]={$search[minweeks]}", "", $tmpurl );
$tmpurl .= "&search[minweeks]=";
?>
								<tr>
									<td class="search-column-1">
									# Weeks on Chart:
</td>									<td class="search-column-2">

 								<select name="search[minweeks]" style="width:400px" onChange='document.location.href="<?=$tmpurl?>" + escape( this.options[this.selectedIndex].value )' >
<option value="">Any</option>
<? 
outputSelectValues( $minweeksvalues, $search[minweeks] );
?>
</select>
</td></tr>

<?php
    $tmpurl = "trend-search-results.php?" . urldecode( $_SERVER['QUERY_STRING'] );
$tmpurl = str_replace( "&newcarryfilter=". $newcarryfilter , "", $tmpurl );
$tmpurl .= "&newcarryfilter=";

    ?>
								<tr>
									<td class="search-column-1">

    Songs to include (New songs/Carryovers): 
</td>									<td class="search-column-2">
								<select id="newcarryfilter" name="newcarryfilter" style="width:400px" onChange='document.location.href="<?=$tmpurl?>" + this.options[this.selectedIndex].value'>
									<option value="">All Songs</option>
	   <? outputSelectValuesForNewCarry( $newcarryfilter, "trend" )?>
								</select>

                                </div><!-- /.form-row-right -->
</td></tr>



    <?php
    $tmpurl = "trend-search-results.php?" . urldecode( $_SERVER['QUERY_STRING'] );
$tmpurl = str_replace( "&genrefilter=". $genrefilter , "", $tmpurl );
$tmpurl .= "&genrefilter=";

    ?>
<?if( isset( $_GET["genrefilter"] ) ) {  ?>
								<tr>
									<td class="search-column-1">

                       Primary Genre: 
</td>									<td class="search-column-2">
								<select name="genrefilter" style="width:400px" onChange='document.location.href="<?=$tmpurl?>" + this.options[this.selectedIndex].value'>
									<option value="">All Primary Genres</option>
								<? outputSelectValues( $allgenresfordropdown, $genrefilter ); ?>
								</select>

                                </div><!-- /.form-row-right -->
</td></tr>
<? } ?>
<? 
$tmpurl = "trend-search-results.php?" . urldecode( $_SERVER['QUERY_STRING'] );
$tmpurl = str_replace( "&search[specificsubgenre]=". $search[specificsubgenre] , "", $tmpurl );
$tmpurl .= "&search[specificsubgenre]=";
if( $search["specificsubgenre"] || 1  ) { 
?>
								<tr>
									<td class="search-column-1">
Sub-Genre:
</td>									<td class="search-column-2">

								<select name="genrefilter" style="width:400px" onChange='document.location.href="<?=$tmpurl?>" + this.options[this.selectedIndex].value'>
									<option value="">All Sub-Genres/Influences</option>
<? outputSelectValuesForOtherTable( "subgenres", $search[specificsubgenre], true ); ?>
								</select>
</td></tr>
    <? } ?>


<? 
$tmpurl = "trend-search-results.php?" . urldecode( $_SERVER['QUERY_STRING'] );
$tmpurl = str_replace( "&search[majorminor]=". $search[majorminor] , "", $tmpurl );
$tmpurl .= "&search[majorminor]=";
?>
								<tr>
									<td class="search-column-1">
Songs in a Major or Minor Key:
</td>									<td class="search-column-2">

								<select name="search[majorminor]" style="width:400px" onChange='document.location.href="<?=$tmpurl?>" + this.options[this.selectedIndex].value'>
									<option value="">All</option>
<? outputSelectValuesDistinct( "majorminor", $search[majorminor] ); ?>
								</select>
</td></tr>


<? 
$tmpurl = "trend-search-results.php?" . urldecode( $_SERVER['QUERY_STRING'] );
$tmpurl = str_replace( "&search[exactbpm]=". $search[exactbpm] , "", $tmpurl );
$tmpurl .= "&search[exactbpm]=";
?>
								<tr>
									<td class="search-column-1">
BPM:
</td>									<td class="search-column-2">

								<select name="search[exactbpm]" style="width:400px" onChange='document.location.href="<?=$tmpurl?>" + this.options[this.selectedIndex].value'>
									<option value="">All</option>
<? outputSelectValuesDistinct( "TempoRange", $search[exactbpm] ); ?>
								</select>
</td></tr>



<? 
$tmpurl = "trend-search-results.php?" . urldecode( $_SERVER['QUERY_STRING'] );
$tmpurl = str_replace( "&search[lyricalthemeid]=". $search[lyricalthemeid] , "", $tmpurl );
$tmpurl .= "&search[lyricalthemeid]=";
?>
								<tr>
									<td class="search-column-1">
Lyrical Theme:
</td>									<td class="search-column-2">

								<select name="search[lyricalsubthemeid]" style="width:400px" onChange='document.location.href="<?=$tmpurl?>" + this.options[this.selectedIndex].value'>
									<option value="">All</option>
<? outputSelectValuesForOtherTable( "lyricalthemes", $search[lyricalthemeid]); ?>

								</select>
</td></tr>


<? 
if( 1 == 0 ) { 
$tmpurl = "trend-search-results.php?" . urldecode( $_SERVER['QUERY_STRING'] );
$tmpurl = str_replace( "&search[lyricalsubthemeid]=". $search[lyricalsubthemeid] , "", $tmpurl );
$tmpurl .= "&search[lyricalsubthemeid]=";
?>
								<tr>
									<td class="search-column-1">
Lyrical Sub Theme:
</td>									<td class="search-column-2">

								<select name="search[lyricalsubthemeid]" style="width:400px" onChange='document.location.href="<?=$tmpurl?>" + this.options[this.selectedIndex].value'>
									<option value="">All</option>
<? outputSelectValuesForOtherTable( "lyricalsubthemes", $search[lyricalsubthemeid]); ?>

								</select>
</td></tr>



<? } ?>




<? 
$tmpurl = "trend-search-results.php?" . urldecode( $_SERVER['QUERY_STRING'] );
$tmpurl = str_replace( "&search[lyricalmoodid]=". $search[lyricalmoodid] , "", $tmpurl );
$tmpurl .= "&search[lyricalmoodid]=";
?>
								<tr>
									<td class="search-column-1">
Lyrical Mood:
</td>									<td class="search-column-2">

								<select name="search[lyricalmoodid]" style="width:400px" onChange='document.location.href="<?=$tmpurl?>" + this.options[this.selectedIndex].value'>
									<option value="">All</option>
<? outputSelectValuesForOtherTable( "lyricalmoods", $search[lyricalmoodid]); ?>

								</select>
</td></tr>







    <?php
    if( !$onlyonequarter && !$onlyoneyear ) { 
    $tmpurl = "trend-search-results.php?" . urldecode( $_SERVER['QUERY_STRING'] );
$tmpurl = str_replace( "&graphtype=". $_GET["graphtype"] , "", $tmpurl );
$tmpurl = str_replace( "&graphtype=". $graphtype , "", $tmpurl );
$tmpurl .= "&graphtype=";
//echo( "$tmpurl -- $_GET[graphtype]" );
    ?>
<? if( isset( $_GET[graphtype] ) && $search[comparisonaspect] != "Number of Weeks" && $search[comparisonaspect] != "Number of Songs" && $search[comparisonaspect] != "Number of Songs (Form)" && !$search["dates"]["season"] ){ ?>
								<tr>
									<td class="search-column-1">
    Output Format: 
</td>									<td class="search-column-2">
 								<select name="graphtype" style="width:400px" onChange='document.location.href="<?=$tmpurl?>" + this.options[this.selectedIndex].value' >
    <? 
    if( !$_GET["graphtype"] ) $_GET["graphtype"] = $graphtype;
foreach( array(  "column"=>"Bar Graph", "line"=>"Line Graph" ) as $pid=>$pval ) { ?>
      <option <?=$_GET["graphtype"] == $pid?"SELECTED":""?> value="<?=$pid?>"><?=$pval?></option>
                                                              <? } ?>
								</select>
</td></tr>
                                      <? } ?>
       <? } ?>

							</table>	
						</div><!-- /.search-hidden -->	
					</div><!-- /.search-body -->
				</div><!-- /.search-container -->
			</div><!-- /.row -->
		</section><!-- /.search-results-top -->			
