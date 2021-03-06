<form class="col s12 m6">
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="establecimiento" type="text" name="establecimiento" class="validate" ng-model="place.establecimiento"
                        ng-change="formChange()">
                        <label for="establecimiento">Nombre del Establecimiento</label>
                    </div>
                     </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="tipo" type="text" name="tipo"
                        class="validate" ng-model="place.tipo"
                        ng-change="formChange()">
                        <label for="tipo">Tipo</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input id="calle" type="text" name="calle" class="validate" ng-model="place.calle" ng-change="formChange()">
                        <label for="calle">Calle</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="altura" type="text" name="altura" class="validate" ng-model="place.altura" ng-change="formChange()">
                        <label for="altura">Altura</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input id="cruce" type="text" name="cruce" class="validate" ng-model="place.cruce" ng-change="formChange()">
                        <label for="cruce">Cruce</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input id="piso_dpto" type="text" name="piso_dpto" class="validate" ng-model="place.piso_dpto" ng-change="formChange()">
                        <label for="piso_dpto">Piso o Departamento</label>
                      </div>
                    </div>



                    <div class="row">
                      <div class="input-field col s12">
                        <input disabled id="nombre_pais" type="text" name="nombre_pais" class="validate" ng-model="place.nombre_pais" ng-change="formChange()">
                        <label for="nombre_pais">Pais</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input disabled id="nombre_provincia" type="text" name="nombre_provincia" class="validate" ng-model="place.nombre_provincia" ng-change="formChange()">
                        <label for="nombre_provincia">Provincia</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input disabled id="nombre_partido" type="text" name="nombre_partido" class="validate" ng-model="place.nombre_partido" ng-change="formChange()">
                        <label for="nombre_partido">Partido</label>
                      </div>
                    </div>
                    <select class=""
                ng-change="showProvince()" ng-model="place.idPais"
                ng-options="v.id as v.nombre_pais for v in countries" material-select watch>
                    <option value="" disabled selected>(Elegir Pais)</option>


                </select>

                <select class=""
                ng-change="loadCity()"
                ng-options="item.id as
                item.nombre_provincia for item in
                provinces track by item.id"
                ng-model="place.idProvincia"
                material-select watch>
                    <option value="" selected>(Elegir Provincia)</option>


                </select>

            <select class="wow "
            ng-change="trackPartido()"
            ng-disabled="!showCity"

            ng-options="v as v.nombre_partido for v in cities
            track by v.id"
            ng-model="place.partido" material-select watch>

                <option value="" disabled selected>(Elegir Partido o Departamento)</option>
            </select>


              <div class="row">
                      <div class="input-field col s12">
                        <input id="otro_partido" type="text" name="otro_partido" class="validate"
                        ng-model="place.otro_partido" ng-change="formChange()">
                        <label for="otro_partido">¿No está el Partido/Departamento? Sugerí uno nuevo.</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="barrio_localidad" type="text" name="barrio_localidad" class="validate" ng-model="place.barrio_localidad" ng-change="formChange()">
                        <label for="barrio_localidad">Barrio o Localidad</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input id="mail" type="email" name="mail" class="validate" ng-model="place.mail" ng-change="formChange()">
                        <label for="mail">Mail</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input id="tel" type="text" name="tel" class="validate" ng-model="place.tel" ng-change="formChange()">
                        <label for="tel">Teléfono</label>
                      </div>
                    </div>


                    <div class="row">
                      <div class="input-field col s12">
                        <textarea id="observacion" type="text"
                        name="observacion"
                        class="validate materialize-textarea" ng-model="place.observacion" ng-change="formChange()"></textarea>
                        <label for="observacion">Observación</label>
                      </div>
                    </div>

                  </br>

                 <div class="row">
                   <div class="valign-demo  valign-wrapper">
                       <div class="valign full-width actions">
                         <p>
                           <input  type="checkbox"
                           name="place.mac"
                           id="filled-in-box-mac"
                           ng-checked="isChecked(place.mac)"
                           ng-model="place.mac"/>
                           <label for="filled-in-box-mac">¿Entrega otros MAC?</label>
                         </p>
                         <p>
                       </div>
                   </div>
                 </div>

                         </form>


<div class="col s12 m6">
                    <div class="row">

                        <label>Localización en Mapa</label>
                        <input id="latitude" type="text" name="latitude"
                        class="validate" ng-model="place.latitude" ng-change="onLatLonInputChange()">
                        <input id="longitude" type="text" name="longitude" class="validate" ng-model="place.longitude" ng-change="onLatLonInputChange()">




                      <ng-map id="mapEditor"
                            lazy-init="true" zoom="14">
                           <marker ng-repeat="pos in positions"

                                position="[[pos.latitude]],[[pos.longitude]]"
                                on-dragend="onDragEnd()"
                                draggable="true">
                          </marker>
                        </ng-map>


                      </br>
                    <div class="row">
                      <div class="valign-demo  valign-wrapper">
                          <div class="valign full-width actions">

                            <button class="waves-effect waves-light btn btn-large full"
                            ng-href="" ng-disabled="spinerflag" ng-click="clicky()">

                            <div class="preloader-wrapper small active" ng-cloak ng-show="spinerflag">
                              <div class="spinner-layer spinner-red-only">
                                <div class="circle-clipper left">
                                <div class="circle"></div>
                                </div><div class="gap-patch">
                                <div class="circle"></div>
                                </div><div class="circle-clipper right">
                                <div class="circle"></div>
                                </div>
                              </div>
                            </div>

                            <div class="" ng-cloak ng-show="!spinerflag">
                              <i class="mdi-content-save left"></i>
                              Guardar
                            </div>

                           </button>
                          </div>
                      </div>
                    </div>

                  </br>
                  <div class="row">
                      <div class="valign-demo  valign-wrapper">
                          <div class="valign full-width actions">
                              <button class="waves-effect waves-light btn btn-large full"
                              ng-href="" ng-disabled="spinerflag" ng-click="clickyApr()">

                              <div class="preloader-wrapper small active" ng-cloak ng-show="spinerflag">
                                <div class="spinner-layer spinner-red-only">
                                  <div class="circle-clipper left">
                                  <div class="circle"></div>
                                  </div><div class="gap-patch">
                                  <div class="circle"></div>
                                  </div><div class="circle-clipper right">
                                  <div class="circle"></div>
                                  </div>
                                </div>
                              </div>

                              <div class="" ng-cloak ng-show="!spinerflag">
                                <i class="mdi-action-done  left"></i>
                                Aprobar
                              </div>

                            </button>
                          </div>
                      </div>
                    </div>
                     </br>
                    <div class="row">
                      <div class="valign-demo  valign-wrapper">
                          <div class="valign full-width actions">
                              <button class="waves-effect waves-light btn btn-large full"
                              ng-href="" ng-disabled="spinerflag" ng-click="clickyDis()">

                              <div class="preloader-wrapper small active" ng-cloak ng-show="spinerflag">
                                <div class="spinner-layer spinner-red-only">
                                  <div class="circle-clipper left">
                                  <div class="circle"></div>
                                  </div><div class="gap-patch">
                                  <div class="circle"></div>
                                  </div><div class="circle-clipper right">
                                  <div class="circle"></div>
                                  </div>
                                </div>
                              </div>

                              <div class="" ng-cloak ng-show="!spinerflag">
                                <i class="mdi-av-not-interested  left"></i>
                                Rechazar
                              </div>

                            </button>
                          </div>
                      </div>
                    </div>




                  </div>
                </div>
