<!-- Navbar component classes -->
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Component classes</h5>
								<div class="heading-elements">
									<ul class="icons-list">
										<li><a data-action="collapse"></a></li>
										<li><a data-action="reload"></a></li>
										<li><a data-action="close"></a></li>
									</ul>
								</div>
							</div>
							<div class="panel-body">
								The table below contains default navbar classes for components available for use in the navbar component. Control navigation and elements placement, color theme of navbar and child elements, dropdown menu appearance and positioning, sizing by adding or removing proper class:
							</div>
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th style="width: 20%;">Class</th>
											<th>Description</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><code>.navbar-nav</code></td>
											<td>Default navbar navigation class, must be used with any navigation type and color. Responsible for basic navigation styling.</td>
										</tr>
										<tr>
											<td><code>.navbar-left</code>, <code>.navbar-right</code></td>
											<td>Positioning classes. Align nav links, forms, buttons, or text, using the <code>.navbar-left</code> or <code>.navbar-right</code> utility classes. Both classes will add a CSS float in the specified direction</td>
										</tr>
										<tr>
											<td><code>.navbar-form</code></td>
											<td>Place form content within <code>.navbar-form</code> for proper vertical alignment and collapsed behavior in narrow viewports. Use the alignment options to decide where it resides within the navbar content.</td>
										</tr>
										<tr>
											<td><code>.navbar-btn</code></td>
											<td>Add the <code>.navbar-btn</code> class to <code>&lt;button></code> elements not residing in a <code>&lt;form></code> to vertically center them in the navbar. Supports default, small and mini button sizes.</td>
										</tr>
										<tr>
											<td><code>.navbar-text</code></td>
											<td>Wrap strings of text in an element with <code>.navbar-text</code>, usually on a <code>&lt;p></code> tag for proper leading and color.</td>
										</tr>
										<tr>
											<td><code>.navbar-link</code></td>
											<td>For standard links that are not within the regular navbar navigation component, use the <code>.navbar-link</code> class to add the proper colors for the default and inverse navbar options.</td>
										</tr>
										<tr>
											<td><code>data-hover="dropdown"</code></td>
											<td>This data attribute shows submenu on hover instead of click. Needs to be added to the parent navigation link after <code>data-toggle="dropdown"</code>. Requires <code>hover_dropdown.min.js</code> file to be added.</td>
										</tr>
										<tr>
											<td><code>.navbar.bg-*</code>, <code>.navbar-header.bg-*</code></td>
											<td>Apply custom background color to the whote navbar or navbar header only. All navbar components automatically adjust their styling according to the navbar color.</td>
										</tr>
										<tr>
											<td><code>.disabled</code></td>
											<td>Disable any navbar navigation item by adding <code>.disabled</code> class to the <code>&lt;li></code> element. To disable item in hover navigation version, <code>data-hover="dropdown"</code> needs to be removed as well.</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!-- /navbar component classes -->