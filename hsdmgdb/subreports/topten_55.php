<? 
// Intro                       |



$allsongs = getSongIdsWithinQuarter( $newarrivalsonly, $sdateq, $sdatey, $edateq, $edatey );
$numsongs = count( $allsongs );
if( !$numsongs ) $numsongs = 1;
$allsongstr = implode( ",", $allsongs );

list( $startdate, $enddate ) = getQuarterTimes( $sdateq, $sdatey );


$thesesongs = db_query_rows( "select songnames.Name as SongName, songs.* from songs, songnames where songnameid = songnames.id and songs.id in ( $allsongstr ) order by SongName", "id" );
$thesesongids = array_keys( $thesesongs );
$numsongs = count( $thesesongs );
$thesesongids[] = -1;

// END STARTING STUFF


$sectiontitle = "Intro Length Range";
$currcolname = "IntroLengthRangeNums";
$orderbycolname = "IntroLengthRangeNums";
genreReportSongColumn( $sectiontitle, $currcolname, $orderbycolname, $thesesongs, $thesesongids );

// start intro length actual 
$rownum++; $colnum = 0;
$sheet->write( $rownum, $colnum++, "Intro Length - Actual", $format_bold );
$rownum++; $colnum = 0;

$sheet->write( $rownum, $colnum++, "Song title", $format_bold );
$sheet->write( $rownum, $colnum++, "Artist", $format_bold );
$sheet->write( $rownum, $colnum++, "Genre", $format_bold );
$sheet->write( $rownum, $colnum++, "Intro Length", $format_bold );

foreach( $thesesongs as $songrow )
{
    $exists = db_query_first_cell( "select songsectionid from song_to_songsection where WithoutNumberHard = 'Intro' and songid = '$songrow[id]'" );
    if( !$exists )
        continue;
    $val = db_query_first_cell( "select time_to_sec( length ) from song_to_songsection where WithoutNumberHard = 'Intro' and songid = '$songrow[id]'" );

    $rownum++;
    $colnum = 0;
    $sheet->write( $rownum, $colnum++, $songrow[SongName] );
    $sheet->write( $rownum, $colnum++, $songrow[ArtistBand] );
    $sheet->write( $rownum, $colnum++, getTableValue( $songrow[GenreID], "genres" ) );
    $sheet->write( $rownum, $colnum++, excelSeconds( $val ), $timeformat );
}
// end intro length actual
$rownum++; $colnum = 0;

// start intro length actual  - bars
$rownum++; $colnum = 0;
$sheet->write( $rownum, $colnum++, "Intro Length - Actual - Bars", $format_bold );
$rownum++; $colnum = 0;

$sheet->write( $rownum, $colnum++, "Song title", $format_bold );
$sheet->write( $rownum, $colnum++, "Artist", $format_bold );
$sheet->write( $rownum, $colnum++, "Genre", $format_bold );
$sheet->write( $rownum, $colnum++, "Intro Length", $format_bold );

foreach( $thesesongs as $songrow )
{
    $exists = db_query_first_cell( "select songsectionid from song_to_songsection where WithoutNumberHard = 'Intro' and songid = '$songrow[id]'" );
    if( !$exists )
        continue;
    $val = db_query_first_cell( "select Bars from song_to_songsection where WithoutNumberHard = 'Intro' and songid = '$songrow[id]'" );

    $rownum++;
    $colnum = 0;
    $sheet->write( $rownum, $colnum++, $songrow[SongName] );
    $sheet->write( $rownum, $colnum++, $songrow[ArtistBand] );
    $sheet->write( $rownum, $colnum++, getTableValue( $songrow[GenreID], "genres" ) );
    $sheet->write( $rownum, $colnum++, $val );
}
// end intro length actual - bars
$rownum++; $colnum = 0;


$sectiontitle = "Intro Type";
$tablename = "introtype";
$orderbycolname = "id";
genreReportSongColumnOtherTable( $sectiontitle, $tablename, $orderbycolname, $thesesongs, $thesesongids );


?>