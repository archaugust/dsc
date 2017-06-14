<section id="header" role="banner">
    <div class="c-header">
    	<div class="o-toolbar u-hidden-xs">
    		<div class="o-wrapper">
	    		<div><b>Call:</b> (03) 365 8348</div>
	    		<div><b>Email:</b> <span class="email-link"></span></div>
	    	</div>
    	</div>
		<div class="o-wrapper">
		   	<div class="o-header-container">
		   		<div class="o-logo-container">
	    			<a href="/" class="svg"><object class="o-logo" type="image/svg+xml" data="$ThemeDir/images/logo.svg">Disabled Snowsports Canterbury</object></a>
	    		</div>
	    		<i class="fa fa-close fa-bars o-menu-mobile"></i>
		    	<div class="o-menu" role="menubar">
		    		<ul role="menu">
			          	<% loop $Menu(1) %>
			          	<% if IsHeader %>
		          		<li role="menuitem">
				            <a class="$LinkingMode" href="$Link">$MenuTitle</a>
						</li>
						<% end_if %>
			            <% end_loop %>
		    		</ul>
		    	</div>
	    	</div>
	    </div>
    </div>
</section>