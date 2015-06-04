<script type="text/ng-template" id="published.html">
	<div ng-repeat="publication in publications" class="media bg-info publication">
		<a class="pull-left" ng-href="{{publication.link}}">
			<img ng-src="{{publication.image}}" class="img-thumbnail" style="width: 200px; ">
		</a>
		<div class="media-body">
			<h4 class="media-heading" style="margin-bottom: 10px; border-bottom: 1px solid gold; padding-bottom: 9px;" ><a ng-href="{{publication.link}}">{{publication.title}}</a></h4>
			<div style="margin-bottom: 10px;">
				<div class="btn-group">
					<button class="btn btn-default edit"><i class="icon-edit"></i> Edit</button>
					<button class="btn btn-default publication-status-button"><span class="glyphicon" ng-class="{'glyphicon-play' : publication.status == 0, 'glyphicon-stop' : publication.status == 1}"></span> {{(publication.status) ? 'paused' : 'published'}}</button>
					<button class="btn btn-danger delete" ><i class="icon-remove-sign"></i> Remove</button>
				</div>
			</div>
			<div>
				<span class="glyphicon glyphicon-tag"></span> Price: ${{publication.price}}<br>
				<span class="glyphicon glyphicon-off"></span> Status: <span class="label" ng-class="{'label-warning' : publication.status == 0, 'label-success' : publication.status == 1}" >{{(publication.status) ? 'published' : 'paused'}}</span> <br>
				<span class="glyphicon glyphicon-th"></span> Quantity in stock: <span class="badge" ng-class="{'badge-important': publication.quantity>=1 && publication.quantity<=5,'badge-warning': publication.quantity>=6 && publication.quantity<=10,'badge-success': publication.quantity>10}">{{publication.quantity}}</span><br>
				<span class="glyphicon glyphicon-calendar"></span> Created: {{publication.created}}
			</div>
		</div>
	</div>
</script>
<script type="text/ng-template" id="noPublished.html">
	<div  class="alert alert-warning" role="alert" >
		No products published yet. <a ng-href="/publish" class="alert-link" >Add a new product!</a>
	</div>
</script>
<script type="text/ng-template" id="drafts.html">
	<div ng-repeat="publication in publications" class="media bg-info publication">
		<a class="pull-left" ng-href="{{publication.draftLink}}">
			<img ng-src="{{publication.image}}" class="img-thumbnail" style="width: 200px;">
		</a>
		<div class="media-body">
			<h4 class="media-heading" style="margin-bottom: 10px; border-bottom: 1px solid gold; padding-bottom: 9px;" ><a ng-href="{{publication.draftLink}}">{{publication.title === "" ? "Untitled" : publication.title}}</a></h4>
			<div style="margin-bottom: 10px;">
				<div class="btn-group">
					<button class="btn btn-default edit"><i class="icon-edit"></i> Edit</button>
				</div>
			</div>
			<div>
				<span class="glyphicon glyphicon-calendar"></span> {{publication.created}}
			</div>
		</div>
	</div>
</script>
<script type="text/ng-template" id="noDrafts.html">
	<div  class="alert alert-warning" role="alert" >
		No drafts. <a ng-href="/publish" class="alert-link" >Add a new product!</a>
	</div>
</script>
<script type="text/ng-template" id="stock.html">
	<div class="col-md-4" ng-repeat="publication in publications">
		<div class="thumbnail">
			<a ng-href="{{publication.link}}"><img ng-src="{{publication.image}}" alt="..."></a>
			<div class="caption" style="border-top: 1px solid gold;">
				<h3><a ng-href="{{publication.link}}" style="color: white;" >{{publication.title | capitalizeFirstChar | limitTo:32 }}</a></h3>
				<h4 style="color: gold;">Price: ${{publication.price}}</h4>
			</div>
		</div>
	</div>
</script>
<script type="text/ng-template" id="noStock.html">
	<div class="alert alert-info" role="alert" >
		$data['User']['name'] - not have publications.
	</div>
</script>

<section ng-controller="PublicationsController" style="padding: 15px;">

	<div ng-if="publications.length > 0">
		<pagination total-items="totalItems" ng-model="currentPage" max-size="maxSize" class="pagination-sm" boundary-links="true" rotate="false" num-pages="numPages"></pagination>
	</div>

<!-- <pre>{{publications | json}}</pre>-->
	<publications data="publications" type="published"></publications>

</section>


<!-- Content
===================== -->
<div class="container-fluid" style="padding-top: 18px; padding-bottom: 18px; display: none;" >
    <div class="row">
        <div class="col-xs-12">
            <!-- start content-->

            <section id="no-products" style="display: none;">
                <div  class="alert alert-warning" role="alert" >
                    No products published yet. <a href="/publish" class="alert-link" >Add a new product!</a>
                </div>
            </section>

            <section id="yes-products" style="display: none;">
                <div class="panel panel-default" style="border: 1px solid black;">
                    <div class="panel-body" style=" padding-top: 10px; padding-bottom: 10px; border-top-left-radius: 4px; border-top-right-radius: 4px; background: url(/resources/app/img/escheresque_ste.png);">
                        <a href="/published" style="font-size: 30px;">Published</a>
                    </div>
                    <div class="panel-footer" style="background: url(/resources/app/img/escheresque.png);border-top: 1px solid gold;">
                        <div class="row">
                            <div class="col-md-4">
                                <!-- búsqueda. -->
                                <form role="form" id="SearchPublicationsForm">
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="search" name="search" placeholder="Eje: Laptops">
									<span class="input-group-btn">
										<button class="btn btn-default" type="submit">Search</button>
									</span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div id="info" class="pull-right">

                                    <!-- Información.
                                   -------------------------------------------------------------------------------------->
                                    <div id="pagination-info" style="overflow: hidden; float: left; margin-right: 10px; line-height: 30px; ">
                                        <span></span>
                                    </div>

                                    <!-- Paginación.
                                    -------------------------------------------------------------------------------------->
                                    <div id="pagination" style="display:none; overflow: hidden;  float: left;"   >
                                        <div style="float: left; margin-right: 10px; ">
                                            <div class="btn-group" >
                                                <button id="prev-page" class="btn btn-default disabled" disabled><i class="icon-chevron-left"></i> Previous</button>
                                                <button id="next-page" class="btn btn-default disabled" disabled><i class="icon-chevron-right"></i> Next</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Ordenar por
                                    ---------------------------------------------------------------------------------------->
                                    <div id="order-by" style="display:none; float: left; margin-right: 10px; ">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                Sort by:  <span id="order-by-text">Latest</span> <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                <li><a id="latest" href="#"><span class="glyphicon glyphicon-time"></span> Latest</a></li>
                                                <li><a id="oldest" href="#"><span class="glyphicon glyphicon-calendar"></span> Oldest</a></li>

                                                <li class="divider"></li>

                                                <li><a id="highest-price" href="#"><span class="glyphicon glyphicon-tags"></span> Highest price</a></li>
                                                <li><a id="lowest-price" href="#"><span class="glyphicon glyphicon-tag"></span> Lowest price</a></li>

                                                <li class="divider"></li>

                                                <li><a id="higher-availability" href="#"><span class="glyphicon glyphicon-th"></span> Higher availability</a></li>
                                                <li><a id="lower-availability" href="#"><span class="glyphicon glyphicon-th-large"></span> Lower availability</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="products" ></div>

                <div id="search-info" style="display: none" class="alert alert-info" role="alert"></div>

            </section>





            <!-- end content-->
        </div>
    </div>
</div>


<!-- Modal para borrar la publicación -->
<div id="delete-product-modal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Do you really want to delete this post?</h4>
            </div>
            <div class="modal-body">
				A better alternative is to pause the publication and activate when the inventory it normalized.
            </div>
            <div class="modal-footer">
                <button id="delete-product-button" type="button" class="btn btn-danger">Confirm</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
