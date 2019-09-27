<style>

.label{

	border:1px solid;

}

.red{

	color:red;

}

.blue{

	color:blue;

}

.brown{

	color:#a94442;

}

</style>

<div class="">



      <div class="page-title">

            <div class="title_left">

              <h3>Track List</h3>

            </div>

          </div>

    <div class="row">

<?php //echo print_r($trackList); ?>

            <div class="col-md-12 col-sm-12 col-xs-12">

              <div class="x_panel">

                <div class="x_title">

                  <h2>List</h2>

                   <div class="clearfix"></div>

                </div>

               <div class="x_content">

                  <p><?php

                        echo $this->session->flashdata('msg');

                        ?></p>

                  <table id="contactTable" class="table table-striped table-bordered">

                      <thead>

                      <tr>

                        <th>IP Address</th>

                        <th>Location</th>

						<th>Time</th>
                        <th>Page</th>

						<th width="80px">Action</th>

                    </tr>

                    </thead>

                    <tbody>

                       <?php if(count($trackList)>0){

						   foreach($trackList as $row){

                // $ip = $row['ip_address'];

                 //$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

				 // $details = json_decode(file_get_contents('http://freegeoip.net/json/'.$ip));

				 

                // print_r($details);

                 //echo $details->city; // -> "Mountain View"

                 ?>

							   <tr>

									<td><?php echo $row['ip_address']; ?></td>

									<td><?php echo $row['location']; ?></td>

									<td><?php echo date('d-m-Y H:i:s a',strtotime($row['open_time'])); ?></td>
                                    <td><?php echo $row['page_name']; ?></td>

									<td><a class="label red" href="#" onclick="confirm_modal('<?php echo base_url('admin/delete-tracker').'/'.$row['track_id']; ?>');">Delete</a> </td>



							   </tr>

						   <?php }

					   }

					   else{ ?>

						   <tr>

							<td colspan="3">No detail found</td>

						   </tr>

					  <?php }  ?>



                    </tbody>

                  </table>





               </div>

              </div>

            </div>

    </div>

</div>

<script type="text/javascript">

$(document).ready( function () {

    //$('#contactTable').DataTable();

} );

	function confirm_modal(delete_url)

	{

		$('#modal-4').modal('show', {backdrop: 'static'});

		document.getElementById('delete_link').setAttribute('href' , delete_url);

	}

	</script>



    <!-- (Normal Modal)-->

    <div class="modal fade" id="modal-4">

        <div class="modal-dialog">

            <div class="modal-content" style="margin-top:100px;">



                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title" style="text-align:center;">Are you sure to delete this Page ?</h4>

                </div>





                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">

                    <a href="#" class="btn btn-danger" id="delete_link">Delete</a>

                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>

                </div>

            </div>

        </div>

    </div>

