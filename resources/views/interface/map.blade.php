
@extends('layouts.master')
@section('content')
 <div id="mapid" style="height:100px;"></div>

  </div>



<script>

  const mymap = L.map('mapid').setView([ 36.36 ,6.6095], 13);

  const urlt="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
  const attribution=  '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributor';
 const tiles= L.tileLayer(urlt,{attribution});
 tiles.addTo(mymap);

 L.Control.geocoder().addTo(mymap);

</script>

@endsection



</body>
</html>
