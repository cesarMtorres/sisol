<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Subir Logo</h4>
</div>
 <div class="modal-body">
 	<div class="row">
 		<div class="col-md-12">
 			<form method="POST" class="dropzone" id="mydropzone">
 				{{ csrf_field() }}
 			</form>
 			
 		</div>
 	</div>
 	
 </div>
 <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
</div>
