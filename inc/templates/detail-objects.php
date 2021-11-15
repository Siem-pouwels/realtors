<template id="detail-objects-template">
  {{#.}}
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">{{street}} {{housenumber}}</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <img src="http://localhost/realtors/inc/house.jpg" style="width: 75%; float: right">
      <h5>Sold: {{sold}}</h5>
      Price: €{{price}}
      <br>
      <br>
      Rooms: {{rooms}}
      <br>
      Bedrooms: {{bedrooms}}
      <br>
      <br>
      Type: {{type}}
      <br>
      <br>
      <br>
      Placement: {{placement}}
      <br>
      Surface: {{surface}}
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
  {{/.}}
</template>