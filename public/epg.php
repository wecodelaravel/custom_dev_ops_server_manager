<?php

$records = file_get_contents("http://bbtv.cms.movetv.com/cms/api/channels/AESTR/schedule/20190701");
$channel = json_decode($records, true);

echo "TITLE: ". $channel['title']."\n";
for($i=0;$i<count($channel);$i++)
{
echo "  SHOW: " . $channel['schedule'][$i]['airing']['name']."\n";
echo "      START: " . $channel['schedule'][$i]['start']."\n";
echo "      STOP: " . $channel['schedule'][$i]['stop']."\n";
}

?>

<?php

$records = file_get_contents("http://bbtv.cms.movetv.com/cms/api/channels/AESTR/schedule/20190701");
$channel = json_decode($records, true);
$channeldata = [];

for($i=0;$i<count($channel);$i++)
{
    $channeldata[] = [
        "TITLE" => $channel['title'],
        "SHOW" => $channel['schedule'][$i]['airing']['name'],
        "START" => $channel['schedule'][$i]['start'],
        "STOP" => $channel['schedule'][$i]['stop']
    ];
}

print_r($channeldata);
?>


