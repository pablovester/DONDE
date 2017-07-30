<div id="activos" class="col s12">


  <h3 ng-cloak ng-hide="loadingPost"  class="title">   </h3>
  <h3 ng-cloak ng-show="loadingPost"> Cargando Lugares aprobados ...</h3>
  <div ng-cloak ng-show="loadingPost" class="progress">
    <div class="indeterminate"></div>
  </div>
<h4>[[prueba]]</h4>
  <h4 ng-cloak ng-show="!places"  ng-hide="loadingPost" translate="panel_actives_title"></h4>
  <select class=""
  ng-change="showProvince()" ng-model="selectedCountry"
  ng-options="v.nombre_pais for v in countries" material-select watch>
  <option value="" disabled selected translate="select_country"></option>


</select>

<select class=""
ng-change="loadCity()"  ng-options="item as
item.nombre_provincia for item in provinces track by item.id"
ng-model="selectedProvince"material-select watch>
<option value="" selected translate="select_state"></option>


</select>

<select class="wow "
ng-change="showSearch()" ng-disabled="!showCity"
ng-options="v.nombre_partido for v in cities track by v.id"
ng-model="selectedCity" material-select watch>

<option value="" disabled selected translate="select_department"></option>
</select>

<div class="row">
      <div class="col s6">
        <a  href="" ng-click="getNow()" class="waves-effect waves-light btn wow">
        <i class="mdi-navigation-chevron-right right"></i>
        <i class="mdi-editor-format-list-bulleted left">
        </i><span translate="search_by_location"></span></a>
      </div>
      <div class="col s6">
        <a  href="" ng-click="activePlacesExport()" class="waves-effect waves-light btn wow">
        <i class="mdi-navigation-chevron-right right"></i>
        <i class="mdi-file-file-download left">
        </i><span translate="panel_actives_export_data"></span></a>

      </div>
</div>
<hr/>

<input type="search" ng-model="searchQuery" placeholder="[['panel_actives_input_placeholder_1' | translate]]"/>


<a  href="" ng-click="searchNow()" class="waves-effect waves-light btn wow">
  <i class="mdi-navigation-chevron-right right"></i>
  <i class="mdi-editor-format-list-bulleted left"></i>
  <span translate="panel_actives_search_by_name_street"></span></a>


<div class="ng-cloak stats" ng-cloak ng-hide="loadingPost">
 <div class="row" ng-hide="!places">

  <h3 ng-if="optionMaster1" class="title"> <span translate="panel_actives_summary_1" translate-values="{places: '[[places.length]]'}"></span><strong> [[selectedCity.nombre_partido || currentKey]] </strong>
    <a ng-if="places.length > 0" target="_self" href="panel/importer/front-export/[[selectedCountry.id]]/[[selectedProvince.id]]/[[selectedCity.id]]" ng-click="" class="waves-effect waves-light btn-floating red"><i class="mdi-file-file-download left"></i></a>
  </h3>

  <h3 ng-if="optionMaster2" class="title" translate="panel_actives_summary_2" translate-values="{places: '[[places.length]]'}"></strong>
    <a ng-if="places.length > 0" target="_self" href="panel/importer/front-export/[[searchQuery]]" ng-click="" class="waves-effect waves-light btn-floating red"><i class="mdi-file-file-download left"></i></a>
  </h3>

    <div class="nav-wrapper"  ng-cloak ng-hide="loadingPost">

    </div>
  </nav>

  <ng-map id="mapEditor" zoom-to-include-markers='true'
  lazy-init="true">
  <marker ng-repeat="pos in places"

  position="[[pos.latitude]], [[pos.longitude]]"
  on-click="showInfo(pos)">
</marker>
</ng-map>
<br>

</div>

<div ng-cloak ng-hide="!places">
  <nav >
    <div class="ng-cloak nav-wrapper"  ng-cloak ng-hide="loadingPost && places.length === 0">
      <form>
        <div class"row">
          <div class="col s12 m12">
            <div class="input-field">
              <input type="search" ng-change="filterAllplaces()" ng-model="searchExistence"
                placeholder="Escribí acá el nombre o calle del establecimieto que queres encontrar">
              <label for="search"><i class="mdi-action-search"></i></label>
            </div>

            <div class="input-field" style="margin-top: 25px;">
            <p>Select All

              <input type="checkbox" id="badGeo" ng-model="onlyBadGeo" ng-change="filterAllplaces()"/>
                <label for="badGeo" translate="panel_actives_badgeo_check"></label>
            </p>
          </div>

        </div>

      </form>
    </div>
  </nav>

  <div class="row">
    <div class="col s6" ng-if="optionMaster1">
      <a class="waves-effect waves-light btn-floating red left" ng-click="openExportEvalModal()">
        <i class="mdi-file-file-download left"></i>
      </a>
    </div>

<!--
    <div class="col s6" ng-if="optionMaster1">
        <b>Exportar Evaluaciones</b>
      <a target="_self" href="panel/importer/front-export-eval/[[selectedCountry.id]]/[[selectedProvince.id]]/[[selectedCity.id]]" ng-click="" class="waves-effect waves-light btn-floating red left">
        <i class="mdi-file-file-download left"></i>
      </a>
    </div>  </div>
    <div class="col s12 right-align" ng-if="optionMaster2">
      <b>Exportar Evaluaciones</b>
      <a target="_self" href="panel/importer/front-export-eval/[[searchQuery]]" ng-click="" class="waves-effect waves-light btn-floating red">
        <i class="mdi-file-file-download left"></i>
      </a>
    </div>

  </div>

  -->
  <h3 ng-cloak ng-show="places.length == 0 && !loadingPost"> <span translate="panel_actives_no_results_1"></span> <span  ng-cloak ng-show="searchExistence">'[[searchExistence]]'</span> <span ng-cloak ng-show="filterLocalidad" translate="panel_actives_no_results_2" translate-values="{location:'[[filterLocalidad]]'}"></span> </h3>
  <div class="section copy row" ng-hide="places.length ===0">
    <div class="col s12 m12 ">

      <table class="bordered striped responsive-table">
        <thead ng-cloak ng-hide="loadingPost">
          <tr>
           <th data-field="establecimiento" translate="establishment"></th>
           <th data-field="nombre_localidad"><span translate="district"></span>, <span translate="state"></span>, <span translate="country"></span></th>
           <th data-field="direccion" translate="street_address"></th>
           <th data-field="" translate="services"></th>
           <th class="center-align" data-field="" translate="puntuation"></th>
           <th data-field=""></th>
         </tr>
       </thead>
       <tbody>
        <tr ng-cloak ng-hide="loadingPost" ng-repeat="place in filteredplaces">
          <td>[[place.establecimiento]]</td>
          <td> [[place.barrio_localidad]] [[place.nombre_partido]], [[place.nombre_provincia]], [[place.nombre_pais]]</td>
          <td>[[place.calle]] [[place.altura]] [[place.cruce]]</td>
          <td class="services2">
            <img ng-show="place.condones" alt="Este lugar distribuye condones" src="images/iconos-new_preservativos-3.png">
            <img ng-show="place.prueba" alt="Este lugar puede hacer prueba de HIV" src="images/iconos-new_analisis-3.png" >
            <img ng-show="place.vacunatorio" alt="Este lugar cuenta con centro vacunatorio" src="images/iconos-new_vacunacion-3.png">
            <img ng-show="place.infectologia" alt="Este lugar cuenta con centro de infectologia" src="images/iconos-new_atencion-3.png" >
            <img ng-show="place.mac" alt="Este lugar cuenta con Servicios de Salud Sexual y Reproductiva" src="images/iconos-new_sssr-3.png" >
            <img ng-show="place.ile" alt="Este lugar cuenta con centro de Interrupcion Legal del Embarazo" src="images/iconos-new_ile-3.png" >
            <img ng-show="place.ssr" alt="Este lugar cuenta con Servicios de Salud Sexual y Reproductiva" src="images/iconos-new_sssr-3.png" >
            <img ng-show="place.dc" alt="Este lugar cuenta con centro de Detección de Cancer" src="images/iconos-new_ile-3.png" >
          </td>

          <td class="center-align services2">
            <div class="row" ng-show="[[place.cantidad_votos]]">

              <div class="col s12">
                <img class="panel-evaluation-activos" alt="" src="images/emojis/[[place.rate]]active.png">
              </div>

              <div class="col s12 evaluation-panel-count">
                [[place.cantidad_votos]] <span translate="evaluation_plural"></span>
              </div>

            </div>
            <div class="row" ng-show="[[place.cantidad_votos < 1]]">
              <div class="col s12 evaluation-panel-count">
                <span style="color: grey;" translate="without_evaluations"></span>
              </div>

            </div>

          </td>

          <td class="actions">
            <a target="_self" ng-href="panel/places/[[place.placeId]]" class="waves-effect waves-light btn-floating"><i class="mdi-content-create left"></i></a>
            <a ng-click="blockNow(place)"class="waves-effect waves-light btn-floating"><i class="mdi-av-not-interested left"></i></a>
          </td>
        </tr>


        <div id="exportEvalModal" class="modal">
            <div class="modal-content">
              <div>
                <h5 class="center-align" translate="panel_actives_modal_title"></h5>
              </div>

                  <div ng-repeat="service in services">
                      <p>
                          <input type="checkbox" id="[[service.code]]" ng-checked="exists(service.code, selected)" ng-click="toggle(service.code, selected)"/>
                            <label for="[[service.code]]">[[service.label]]</label>
                      </p>
                    </div>
            </div>
            <div class="modal-footer">
              <div class="col s6" ng-if="optionMaster1">
                <!--
                <a target="_self" href="panel/importer/front-export-eval/[[selectedCountry.id]]/[[selectedProvince.id]]/[[selectedCity.id]]" ng-click="" class="waves-effect waves-light btn-floating red left">
                  <i class="mdi-file-file-download left modal-action modal-close"></i>
                </a>
                -->
                <a target="_self" href="" ng-show="!disableExportEvaluationButton()" ng-click="exportEvaluations()" class="waves-effect waves-light btn-floating red left">
                  <i class="mdi-file-file-download left modal-action modal-close"></i>
                </a>

            </div>
              <div class="col s6" ng-if="optionMaster2">

                <a target="_self" href="panel/importer/front-export-eval/[[searchQuery]]" ng-click="" class="waves-effect waves-light btn-floating red">
                  <i class="mdi-file-file-download left modal-action modal-close"></i>
                </a>
              </div>


              <a href="" class=" modal-action modal-close
                waves-effect waves-green btn-flat right">Cancelar</a>
            </div>


            </div>


      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>