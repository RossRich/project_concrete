@start('header')

    {{ $app->assets(['collections:assets/collections.js','collections:assets/js/collection.js'], $app['cockpit/version']) }}
    {{ $app->assets(['assets:vendor/uikit/js/components/nestable.min.js'], $app['cockpit/version']) }}

    @trigger('cockpit.content.fields.sources')

@end('header')

<div data-ng-controller="collection" data-id="{{ $id }}" ng-cloak>

    <h1>
        <a href="@route("/collections")">@lang('Collections')</a> /
        <span class="uk-text-muted" ng-show="!collection.name">@lang('Collection')</span>
        <span ng-show="collection.name">@@ collection.name @@</span>
    </h1>

    <form class="uk-form" data-ng-submit="save()" data-ng-show="collection">

        <div class="uk-grid">

            <div class="uk-width-3-4">

                    <div class="uk-form-row">
                        <input class="uk-width-1-1 uk-form-large" type="text" placeholder="@lang('Name')" data-ng-model="collection.name" required>
                        <div class="uk-margin-top">
                            <input class="uk-width-1-1 uk-form-blank uk-text-muted" type="text" data-ng-model="collection.slug" app-slug="collection.name" placeholder="@lang('Slug...')" title="slug" data-uk-tooltip="{pos:'left'}">
                        </div>
                    </div>

                    <div class="uk-form-row uk-margin uk-text-center" data-ng-show="!collection.fields || !collection.fields.length">
                            <div class="app-panel">
                                <h2>@lang('Fields')</h2>
                                <p>
                                    @lang('It seems you don\'t have any fields created.')
                                </p>
                            <button data-ng-click="addfield()" type="button" class="uk-button uk-button-success uk-button-large">@lang('Add field')</button>
                        </div>
                    </div>

                    <div class="uk-form-row uk-margin" data-ng-show="collection.fields && collection.fields.length">
                        <strong>@lang('Fields')</strong>
                    </div>

                    <div class="uk-form-row" data-ng-show="collection.fields && collection.fields.length">
                        <ul class="uk-list">
                            <li class="uk-margin-bottom uk-clearfix" data-ng-repeat="field in collection.fields">

                                <div class="uk-panel app-panel">

                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-3-4">
                                            <input class="uk-width-1-1 uk-form-blank" type="text" data-ng-model="field.name" placeholder="@lang('Field name')" pattern="[a-zA-Z0-9_]+" required>
                                        </div>
                                        <div class="uk-width-1-4 uk-text-right">
                                            <a ng-click="toggleOptions($index)"><i class="uk-icon-cog"></i></a>
                                            <a data-ng-click="remove(field)" class="uk-close"></a>
                                        </div>
                                    </div>

                                    <div id="options-field-@@ $index @@" class="app-panel-box docked-bottom uk-hidden">

                                        <div class="uk-grid uk-grid-small">
                                            <div class="uk-width-1-3">
                                                <label class="uk-text-small">@lang('Field type')</label>
                                                <select class="uk-width-1-1" data-ng-model="field.type" title="@lang('Field type')" ng-options="f.name as f.label for f in contentfields"></select>
                                            </div>
                                            <div class="uk-width-1-3">
                                                <label class="uk-text-small">@lang('Field label')</label>
                                                <input class="uk-width-1-1" type="text" data-ng-model="field.label" placeholder="@lang('Field label')">
                                            </div>
                                            <div class="uk-width-1-3">
                                                <label class="uk-text-small">@lang('Default value')</label>
                                                <input type="text" class="uk-width-1-1" data-ng-model="field.default" placeholder="@lang('Default value')">
                                            </div>
                                            <div class="uk-width-1-3" ng-show="collection.tabs.length">
                                                <label class="uk-text-small">@lang('Tab')</label>
                                                <select class="uk-width-1-1" data-ng-model="field.tab" title="@lang('Tab')" data-uk-tooltip>
                                                    <option value="main">Общая вкладка</option>
                                                    <option value="side">Боковая панель</option>
                                                    <option value="@@ tab.name @@" data-ng-repeat="tab in collection.tabs">@@ tab.name @@</option>
                                                </select>
                                                <p>selected: @@ field.tab @@</p>
                                            </div>
                                            <div class="uk-width-1-3" ng-show="collection.tabs.length">
                                                <label class="uk-text-small">@lang('Width')</label>
                                                <select class="uk-width-1-1" data-ng-model="field.width" title="@lang('Width')" data-uk-tooltip>
                                                    <option value="2-3">Две трети ширины</option>
                                                    <option value="1-3">Треть ширины</option>
                                                    <option value="1-2">Половина ширины</option>
                                                    <option value="1-1" selected>Вся ширина</option>
                                                </select>
                                            </div>

                                            <div class="uk-width-1-1 uk-grid-margin">

                                                <strong class="uk-text-small">Extra options</strong>
                                                <hr>
                                                <div class="uk-form uk-form-horizontal">

                                                    <div class="uk-form-row">
                                                        <label class="uk-form-label">@lang('Required')</label>
                                                        <div class="uk-form-controls">
                                                            <input type="checkbox" data-ng-model="field.required" />
                                                        </div>
                                                    </div>

                                                    <div class="uk-form-row" data-ng-if="field.type=='text'">
                                                        <label class="uk-form-label">@lang('Slug')</label>
                                                        <div class="uk-form-controls">
                                                            <input type="checkbox" data-ng-model="field.slug" />
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="uk-form-row" data-ng-if="field.type=='text'">
                                                        <label class="uk-form-label">@lang('Uniq slug')</label>
                                                        <div class="uk-form-controls">
                                                            <input type="checkbox" data-ng-model="field.uniqSlug">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="uk-form-row" data-ng-if="field.type=='text'">
                                                        <label class="uk-form-label">@lang('Disabled')</label>
                                                        <div class="uk-form-controls">
                                                            <input type="checkbox" data-ng-model="field.disabled">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="uk-form-row" data-ng-if="field.type=='text'">
                                                        <label class="uk-form-label">@lang('Iterator')</label>
                                                        <div class="uk-form-controls">
                                                            <input type="text" data-ng-model="field.iterator">
                                                        </div>
                                                    </div>

                                                    @if(count($locales))
                                                    <div class="uk-form-row">
                                                        <label class="uk-form-label">@lang('Localize')</label>
                                                        <div class="uk-form-controls">
                                                            <input type="checkbox" data-ng-model="field.localize" />
                                                        </div>
                                                    </div>
                                                    @endif

                                                    <div class="uk-form-row" data-ng-if="field.type=='select'">
                                                        <label class="uk-form-label">@lang('Options')</label>
                                                        <div class="uk-form-controls">
                                                            <input class="uk-form-blank" type="text" data-ng-model="field.options" ng-list placeholder="@lang('options...')" title="@lang('Separate different options by comma')" data-uk-tooltip>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="uk-form-row" data-ng-if="field.type=='select'">
                                                        <label class="uk-form-label">@lang('Link to other field')</label>
                                                        <div class="uk-form-controls">
                                                            <select data-ng-model="field.parent">
                                                                <option value="false" ng-selected="@@ (field.parent == false) @@">Не указан</option>
                                                                <option data-ng-repeat="f in collection.fields" value="@@ f.name @@" ng-selected="@@ (field.parent == f.name) @@">@@ f.label @@</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="uk-form-row" data-ng-if="field.type=='media'">
                                                        <label class="uk-form-label">@lang('Extensions')</label>
                                                        <div class="uk-form-controls">
                                                            <input class="uk-form-blank" type="text" data-ng-model="field.allowed" placeholder="*.*" title="@lang('Allowed media types')" data-uk-tooltip>
                                                        </div>
                                                    </div>

                                                    <div class="uk-form-row" data-ng-if="field.type=='code'">
                                                        <label class="uk-form-label">@lang('Syntax')</label>
                                                        <div class="uk-form-controls">
                                                            <select data-ng-model="field.syntax" title="@lang('Code syntax')" data-uk-tooltip>
                                                                <option value="text">Text</option>
                                                                <option value="css">CSS</option>
                                                                <option value="htmlmixed">Html</option>
                                                                <option value="javascript">Javascript</option>
                                                                <option value="markdown">Markdown</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="uk-form-row" data-ng-if="field.type=='link-collection'">
                                                        <label class="uk-form-label">@lang('Collection')</label>
                                                        <div class="uk-form-controls">
                                                            <select ng-options="c._id as c.name for c in collections" data-ng-model="field.collection" title="@lang('Related collection')" data-uk-tooltip required></select>
                                                            <input type="checkbox" data-ng-model="field.multiple"> @lang('multiple')
                                                            <input type="checkbox" data-ng-model="field.selectbox"> @lang('Select Box')
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="uk-form-row" data-ng-if="field.type=='link-collection'">
                                                        <label class="uk-form-label">@lang('Option for subselect')</label>
                                                        <div class="uk-form-controls">
                                                            <select ng-options="c.name as c.label for c in getCollection(collections, field.collection).fields" data-ng-model="field.subOptionSource"></select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="uk-form-row" data-ng-if="field.type=='link-user'">
                                                        <label class="uk-form-label">@lang('Group')</label>
                                                        <div class="uk-form-controls">
                                                            <select ng-options="" data-ng-model="field.group" title="@lang('Group')" data-uk-tooltip>
                                                                <option val="all">@lang('All')</option>
                                                            </select>
                                                            <input type="checkbox" data-ng-model="field.multiple"> @lang('multiple')
                                                        </div>
                                                    </div>

                                                    <div class="uk-form-row" data-ng-if="field.type=='multifield'">
                                                        <label class="uk-form-label">@lang('Multi field')</label>
                                                        <div class="uk-form-controls">
                                                            <span class="uk-text-muted uk-text-small">@lang('Allowed fields'):</span>
                                                            <div class="uk-scrollable-box uk-panel-box uk-margin-small-top">
                                                                <div ng-repeat="cf in contentfields" ng-if="(['select', 'boolean', 'multifield'].indexOf(cf.name) == -1)">
                                                                    <input type="checkbox" data-ng-model="field.allowedfields[cf.name]"> @@ cf.label @@
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="uk-form-row">
                                                        <label class="uk-form-label">@lang('Bold title')</label>
                                                        <div class="uk-form-controls">
                                                            <input type="checkbox" data-ng-model="field.strong" />
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="uk-form-row">
                                                        <label class="uk-form-label">@lang('Add to filter')</label>
                                                        <div class="uk-form-controls">
                                                            <input type="checkbox" data-ng-model="field.filter" />
                                                        </div>
                                                    </div>

                                                    @trigger('cockpit.content.fields.settings')

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                        </ul>

                        <button data-ng-click="addfield()" type="button" class="uk-button uk-button-success"><i class="uk-icon-plus-circle" title="@lang('Add field')"></i></button>
                    </div>
                    <br>
                    <br>

                    <div class="uk-form-row" data-ng-show="collection.fields && collection.fields.length">
                        <div class="uk-button-group">
                            <button type="submit" class="uk-button uk-button-primary uk-button-large">@lang('Save Collection')</button>
                            <a href="@route('/collections/entries')/@@ collection._id @@" class="uk-button uk-button-large" data-ng-show="collection._id"><i class="uk-icon-list"></i> @lang('Goto entries')</a>
                        </div>
                        &nbsp;
                        <a href="@route('/collections')">@lang('Cancel')</a>
                    </div>

            </div>
            <div class="uk-width-1-4" data-ng-show="collection.fields && collection.fields.length">

                <strong>@lang('Settings')</strong>

                <div class="uk-margin">
                    <div class="uk-form-controls uk-margin-small-top">
                        <input type="checkbox" data-ng-model="collection.singlePath" /> @lang("Single path")
                    </div>
                </div>
                
                <div class="uk-margin">
                    <div class="uk-form-controls uk-margin-small-top">
                        <input type="checkbox" data-ng-model="collection.showtoall" /> @lang("Show to all")
                    </div>
                </div>
                
                <div class="uk-margin">
                    <p>@lang("Group")</p>
                    <div class="uk-form-controls uk-margin-small-top">
                        <div class="uk-form-select">
                            <i class="uk-icon-sitemap uk-margin-small-right"></i>
                            <a>@@ collection.group || '- @lang("No group") -' @@</a>
                            <select class="uk-width-1-1 uk-margin-small-top" data-ng-model="collection.group">
                                <option ng-repeat="group in groups" value="@@ group @@">@@ group @@</option>
                                <option value="">- @lang("No group") -</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="uk-margin">
                    <p>@lang("Template")</p>
                    <div class="uk-form-controls uk-margin-small-top">
                        <div class="uk-form-select">
                            <i class="uk-icon-cube uk-margin-small-right"></i>
                            <a>@@ customViews[collection.customView].name || '- @lang("No template") -' @@</a>
                            <select class="uk-width-1-1 uk-margin-small-top" data-ng-model="collection.customView">
                                <option ng-repeat="view in customViews" value="@@ view.path @@">@@ view.name @@</option>
                                <option value="">- @lang("No template") -</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="uk-margin">
                    <p>
                        @lang('Fields on entries list page'):
                    </p>
                    <ul id="fields-list" class="uk-nestable" data-uk-nestable="{maxDepth:1}">
                        <li class="uk-nestable-list-item" data-ng-repeat="field in collection.fields">
                            <div class="uk-nestable-item uk-nestable-item-table">
                                <div class="uk-nestable-handle"></div>
                                <input type="checkbox" data-ng-checked="field.lst" data-ng-model="field.lst">
                                @@ field.name @@
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="uk-margin">
                    <p>
                        @lang('Order entries on list page'):
                    </p>

                    <select class="uk-width-1-1 uk-margin-bottom" data-ng-model="collection.sortfield"  ng-options="f.name as f.name for f in sortfields"></select>
                    <select class="uk-width-1-1" data-ng-model="collection.sortorder">
                        <option value="-1">@lang('descending')</option>
                        <option value="1">@lang('ascending')</option>
                    </select>
                </div>
                
                <div class="uk-margin">
                    <p>@lang('Tabs')</p>
                    <ul id="tabs-list" class="uk-nestable" data-uk-nestable="{maxDepth:1}">
                        <li class="uk-nestable-list-item" data-ng-repeat="tab in collection.tabs">
                            <div class="uk-nestable-item uk-nestable-item-table">
                                <div class="uk-nestable-handle"></div>
                                <input class="uk-form-blank" type="text" data-ng-model="tab.name" placeholder="@lang('Tab name')"  required>
                                <a data-ng-click="removeTab(tab)" class="uk-close uk-float-right"></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="uk-margin">
                    <button data-ng-click="addtab()" type="button" class="uk-button uk-button-success"><i class="uk-icon-plus-circle" title="@lang('Add tab')"></i> @lang('Add tab')</button>
                </div>

            </div>

        </div>

    </form>
</div>
