@extends('layout.app')
@section('body_class','archive tax-rtcl_category term-houses term-257 wp-custom-logo rtcl rtcl-page rtcl-archive-no-sidebar rtcl-no-js ehf-header ehf-footer ehf-template-classima ehf-stylesheet-classima header-style-2 footer-style-1 banner-enabled has-sidebar left-sidebar elementor-default elementor-kit-2161')
@section('content')


<div id="primary" class="content-area classima-listing-archive rtcl">
	<div class="container">

		<div class="row">

			<div class="col-xl-3 col-lg-4 col-sm-12 col-12"><a id="classima-toggle-sidebar" href="#">Toggle Filter</a>

				<aside class="sidebar-widget-area sidebar-listing-archive">
					<div class="rtcl-widget-filter-wrapper style2">
						<div id="rtcl-widget-filter-6" class="widget rtcl rtcl-widget-filter-class">
							<div class="panel-block">
								<form class="rtcl-filter-form" action="{{route('home.main')}}">
									<div class="ui-accordion">
										<div class="rtcl-ad-type-filter ui-accordion-item is-open">
											<a class="ui-accordion-title">
												<span>Type</span>
												<span class="ui-accordion-icon rtcl-icon rtcl-icon-anchor"></span>
											</a>
											<div class="ui-accordion-content">
												<ul class='ui-link-tree is-collapsed'>
													<li class='ui-link-tree-item ad-type-for_sale'><input
															id='filters-ad-type-values-for_sale' name='type'
															value='sale' type='radio'
															class='ui-checkbox filter-submit-trigger'><a href='#'
															class='filter-submit-trigger'>@lang('lang.sale')</a></li>
													<li class='ui-link-tree-item ad-type-for_rent'><input
															id='filters-ad-type-values-for_rent' name='type'
															value='rent' type='radio'
															class='ui-checkbox filter-submit-trigger'><a href='#'
															class='filter-submit-trigger'>@lang('lang.rent')</a></li>
													<li class='ui-link-tree-item ad-type-for_exchange'><input
															id='filters-ad-type-values-for_exchange'
															name='type' value='instead' type='radio'
															class='ui-checkbox filter-submit-trigger'><a href='#'
															class='filter-submit-trigger'>@lang('lang.instead')</a></li>

												</ul>
											</div>
										</div>
										<div class="rtcl-category-filter ui-accordion-item is-open">
											<a class="ui-accordion-title">
												<span>Category</span>
												<span class="ui-accordion-icon rtcl-icon rtcl-icon-anchor"></span>
											</a>
											<div class="ui-accordion-content rtcl-ajax-load"
												>
												<ul class='ui-link-tree is-collapsed overflow-hidden'>
													{{-- @foreach ($categories as $item ) --}}
													<li class='ui-link-tree-item ad-type-for_residential'><input
														id='filters-ad-type-values-for_residential' name='category_ads_type'
														value='1' type='radio'
														class='ui-checkbox filter-submit-trigger'>@lang('lang.residential')</li>

													<li class='ui-link-tree-item ad-type-for_commercial'><input
															id='filters-ad-type-values-for_commercial' name='category_ads_type'
															value='3' type='radio'
															class='ui-checkbox filter-submit-trigger'>@lang('lang.commercial')</li>

													<li class='ui-link-tree-item ad-type-for_commercial_unit'><input
															id='filters-ad-type-values-for_commercial_unit' name='category_ads_type'
															value='2' type='radio'
															class='ui-checkbox filter-submit-trigger'>@lang('lang.commercial_units')</li>

													<li class='ui-link-tree-item ad-type-investment'><input
															id='filters-ad-type-values-investment' name='category_ads_type'
															value='4' type='radio'
															class='ui-checkbox filter-submit-trigger'>@lang('lang.investment')</li>

													<li class='ui-link-tree-item ad-type-industrial'><input
															id='filters-ad-type-values-industrial' name='category_ads_type'
															value='5' type='radio'
															class='ui-checkbox filter-submit-trigger'>@lang('lang.industrial')</li>


													<li class='ui-link-tree-item ad-type-chalet'><input
															id='filters-ad-type-values-chalet' name='category_ads_type'
															value='6' type='radio'
															class='ui-checkbox filter-submit-trigger'>@lang('lang.chalet')</li>

													<li class='ui-link-tree-item ad-type-farm'><input
															id='filters-ad-type-values-farm' name='category_ads_type'
															value='7' type='radio'
															class='ui-checkbox filter-submit-trigger'>@lang('lang.farm')</li>



													<li class='ui-link-tree-item ad-type-break'><input
															id='filters-ad-type-values-break' name='category_ads_type'
															value='8' type='radio'
															class='ui-checkbox filter-submit-trigger'>@lang('lang.break')</li>


													<li class='ui-link-tree-item ad-type-lands'><input
															id='filters-ad-type-values-lands' name='category_ads_type'
															value='9' type='radio'
															class='ui-checkbox filter-submit-trigger'>@lang('lang.lands')</li>

													<li class="is-opener"><span class="rtcl-more"><i
																class="rtcl-icon rtcl-icon-plus-circled"></i><span
																class="text">Show More</span></span></li>

															{{-- @endforeach --}}
												</ul>

											</div>
										</div>
										<div class="rtcl-location-filter ui-accordion-item is-open">
											<a class="ui-accordion-title">
												<span>@lang('lang.location')</span>
												<span class="ui-accordion-icon rtcl-icon rtcl-icon-anchor"></span>
											</a>
											<div class="ui-accordion-content rtcl-ajax-load"
												data-settings="{&quot;taxonomy&quot;:&quot;rtcl_location&quot;,&quot;parent&quot;:0,&quot;instance&quot;:{&quot;title&quot;:&quot;&quot;,&quot;search_by_category&quot;:1,&quot;show_icon_image_for_category&quot;:1,&quot;search_by_location&quot;:1,&quot;search_by_ad_type&quot;:1,&quot;search_by_custom_fields&quot;:1,&quot;search_by_price&quot;:1,&quot;hide_empty&quot;:0,&quot;show_count&quot;:1,&quot;ajax_load&quot;:1,&quot;taxonomy_reset_link&quot;:1,&quot;radius_search&quot;:0,&quot;search_by_rating&quot;:1,&quot;filter_style&quot;:&quot;style2&quot;,&quot;current_taxonomy&quot;:{&quot;rtcl_location&quot;:&quot;&quot;,&quot;rtcl_category&quot;:&quot;&quot;,&quot;rtcl_tag&quot;:&quot;&quot;}}}">
											</div>
										</div>
										<div class="rtcl-price-filter ui-accordion-item is-open">
											<a class="ui-accordion-title">
												<span>@lang('lang.price_range')</span>
												<span class="ui-accordion-icon rtcl-icon rtcl-icon-anchor"></span>
											</a>
											<div class="ui-accordion-content">
												<div class="form-group">
													<div class="price-container">
														<div class="row">
															<div class="col-md-6 col-6">
																<input type="number" name="min-price"
																	class="form-control" placeholder="min" value="">
															</div>
															<div class="col-md-6 col-6">
																<input type="number" name="max-price"
																	class="form-control" placeholder="max" value="">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="ui-buttons has-expanded">
										<button class="btn btn-primary rtcl-filter-btn">
											@lang('lang.apply_filter') </button>
										<a class="btn btn-primary rtcl-filter-clear-btn"
											href="{{route('home.main')}}">
											@lang('lang.clear_filter') </a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</aside>
			</div>

			<div class="col-xl-9 col-lg-8 col-sm-12 col-12">


				<div class="listing-archive-top mt-4">
					<h2 class="rtin-title"> Showing {{ $data->firstItem() }}–{{ $data->lastItem() }} of {{ $data->total() }} results</h2>
					<div class="listing-sorting">
						<form class="rtcl-ordering" method="get">
							<select name="orderby" class="orderby" aria-label="Listing order">
								<option value="title-asc">A to Z ( title )</option>
								<option value="title-desc">Z to A ( title )</option>
								<option value="date-desc" selected='selected'>Recently added ( latest )</option>
								<option value="date-asc">Date added ( oldest )</option>
								<option value="views-desc">Most viewed</option>
								<option value="views-asc">Less viewed</option>
								<option value="price-asc">Price ( low to high )</option>
								<option value="price-desc">Price ( high to low )</option>
							</select>
							<input type="hidden" name="paged" value="1" />
							<input type="hidden" name="filters[ad_type]" value="" /><input type="hidden"
								name="rtcl_location" value="" /><input type="hidden" name="rtcl_category"
								value="" /><input type="hidden" name="q" value="" />
						</form>
						<div class="rtcl-view-switcher">
							<a class="rtcl-view-trigger" data-type="list"
								href="/alfuraij/all-ads/?filters%5Bad_type%5D&#038;rtcl_location&#038;rtcl_category&#038;q&#038;view=list"><i
									class="rtcl-icon rtcl-icon-th-list"> </i></a>
							<a class="rtcl-view-trigger active" data-type="grid"
								href="/alfuraij/all-ads/?filters%5Bad_type%5D&#038;rtcl_location&#038;rtcl_category&#038;q&#038;view=grid"><i
									class="rtcl-icon rtcl-icon-th-large"> </i></a>
						</div>
					</div>
				</div>


				<div class="rtcl rtcl-listings rtcl-listings-grid">
					<div class="">
						<div class="row auto-clear">
                            @foreach ($data as $item )

                            <div class="col-xl-4 col-md-6 col-sm-6 col-12">
                                <div
                                    class="listing-grid-each listing-grid-each-8 listing-grid-each-9 rtcl-listing-item">
                                    <div class="rtin-item">
                                        {{-- <div class="rtin-thumb">
                                            <a class="rtin-thumb-inner rtcl-media"
                                                href="{{route('advertisment.show',$item->id)}}"><img
                                                    loading="lazy" width="400" height="280"
                                                    src="
                                                    @if(count($item->adsImage) == 0)
                                						https://admin.alfuraij.com/assets/images/default.jpg
                                				    @else
                                				        https://admin.alfuraij.com/uploads/ads/{{$item->adsImage[0]->image}}
                                				    @endif
                                                    "
                                                    class="rtcl-thumbnail" alt="{{$item->title}}" decoding="async"
                                                    title="{{$item->title}}"></a>

                                                    <div class="rtin-featured-ad">
                                                        <span class="badge rtcl-badge-featured">{{$item->ads_type}}</span>                </div>
                                            <div class="rtin-type">
                                                <span>For {{$item->type}}</span>
                                            </div>
                                            <div class="rtcl-meta-buttons">
                                                <div class="rtcl-tooltip-wrapper rtcl-btn"
                                                    data-listing_id="2068">
                                                    <a href="javascript:void(0)"
                                                        class="rtcl-require-login "><span
                                                            class="rtcl-icon rtcl-icon-heart-empty"></span><span
                                                            class="favourite-label">@lang('lang.add_to_fav')</span></a>
                                                </div>
                                            </div>

                                        </div> --}}
                                        <div class="rtin-content">

                                            <div class="rtcl-listing-badge-wrap"></div>

                                            <h3 class="rtin-title listing-title" title="{{$item->title}}"><a
                                                    href="{{route('advertisment.show',$item->id)}}">{{$item->title}}</a></h3>

                                            <div class="rtin-cat-action">
                                                {{-- <div class="rtin-cat-wrap">
                                                    <a class="rtin-cat" href="{{route('home.main')}}?category_id={{$item->category_id}}">{{$item->category->name_ar}}</a>
                                                </div> --}}
                                            </div>

                                            <div class="rtcl-listable">
                                                @if ($item->space != null)
                                                <div class="rtcl-listable-item">
                                                    <span class="listable-label">Land Area</span>
                                                    <span class="listable-value">{{$item->space}}</span>
                                                </div>
                                                @endif

                                                @if ($item->num_of_rooms != null)
                                                <div class="rtcl-listable-item">
                                                    <span class="listable-label">Room #</span>
                                                    <span class="listable-value">{{$item->num_of_rooms}}</span>
                                                </div>
                                                @endif

                                                @if ($item->advantages != null)

												<div class="rtcl-listable-item">
                                                    <span class="listable-label">Features</span>
                                                    <span class="listable-value">{{$item->advantages}}</span>
                                                </div>
                                                @endif

                                                @if ($item->advantages != null)
                                                <div class="rtcl-listable-item">
                                                    <span class="listable-label">Bathrooms #</span>
                                                    <span class="listable-value">{{$item->num_of_bath}}</span>
                                                </div>
                                                @endif

                                                </div>
                                            <ul class="rtin-meta">
                                                <li>
                                                    <i class="far fa-fw fa-clock" aria-hidden="true"></i>
                                                    {{\Carbon\Carbon::parse($item->updated_at)->diffForHumans()}}
                                                </li>
                                                {{-- <li>
                                                    <i class="fa fa-fw fa-map-marker" aria-hidden="true"></i><a
                                                        href="{{route('home.main')}}?area_id={{$item->area_id}}">{{$item->area->name_ar}}</a><span
                                                        class="rtcl-delimiter">,</span>
                                                </li> --}}
                                                {{-- <li>
                                                    <i class="fa fa-fw fa-eye" aria-hidden="true"></i>{{$item->getViews()}} Views
                                                </li> --}}
                                            </ul>
											@if ($item->price != null)
											<div class="item-price">
												<div class="rtcl-price price-type-regular"><span
														class="rtcl-price-amount amount">{{$item->price}}&nbsp;<span
															class="rtcl-price-currencySymbol">&#x62f;.&#x643;</span></span>
												</div>
											</div>
											@endif


                                        </div>
                                    </div>

                                </div>

                            </div>
                           @endforeach
						</div>
					</div>
				</div>


				<div class="pagination-area elementwidth elwidth-680 elwidth-480">
					<ul class="clearfix">
                        @if ($data->hasMorePages())
                        <li class="pagi-previous">
                            <a href="{{ $data->previousPageUrl() }}">
                                <span>
                                    <i class="fa fa-angle-double-left"
                            aria-hidden="true"></i>@lang('lang.previous')</span>
                            </a>
                            </li>
                        @else

						<li class="pagi-previous disabled"><span><i class="fa fa-angle-double-left"
                            aria-hidden="true"></i>@lang('lang.previous')</span></li>
                        @endif

                        @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                            <li class="{{ $page == $data->currentPage() ? 'active' : '' }}"><a
                                href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach
						@if ($data->hasMorePages())
                        <li class="pagi-next"><a
                            href="{{ $data->nextPageUrl() }}">@lang('lang.next')<i
                                class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>

                        @else
                        <li class="pagi-next disabled"><span><i class="fa fa-angle-double-right"
                            aria-hidden="true"></i>@lang('lang.next')</span></li>
                        @endif

					</ul>
				</div>

			</div>


		</div>
	</div>
</div>



@endsection
