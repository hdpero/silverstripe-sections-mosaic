<% require javascript("sections-mosaic/js/wookmark/wookmark.min.js") %>
<% require javascript("sections-mosaic/js/mosaic.js") %>
<% require css("sections-mosaic/css/mosaic.css") %>
<div {$ClassAttr}{$AnchorAttr}>
	<div class="grid" id="imageContainer">
		<%-- <div class="grid-sizer"></div> --%>
		<% loop MosaicImages.Sort('Sort', ASC) %>
			<li class="grid-item">
				<% if FancyboxEnabled %>
					<a href="$Image.URL" class="fancybox" title="$Caption">
						<img class="mosaic-image" src="$Image.ScaleWidth(230).URL" >
					</a>
				<% else %>
					<img class="mosaic-image" src="$Image.ScaleWidth(230).URL" >
				<% end_if %>
			</li>
		<% end_loop %>
	</div>
</div>
