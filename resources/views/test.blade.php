<?php
$reference = $db->getReference('LED/');
            $snapshot = $reference->getSnapshot();
            $value =  $snapshot->getValue();
            $count =  $snapshot->hasChildren();
            $name =  $db->getReference('LED/light5')->getValue();
            $reference1 = $db->getReference('LED/light')->set(1);
?>
{{$name}}

@foreach ($value as $test)
    @if ($test === 5)
        <?php echo"test";?>
    @else



    <br>
    @endif

    <br>
@endforeach




