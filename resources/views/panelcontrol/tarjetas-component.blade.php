<div>
      
    <div class="grid gap-1 grid-cols-1 md:grid-cols-6 mb-6">
      <div class="card">
        <div class="card-content" style="padding: 0.5em">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3>
                Registrados
              </h3>
              <h1>
                {{ $NroRegistrados }}
              </h1>
            </div>
            <span class="icon widget-icon text-blue-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-content" style="padding: 0.5em">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3>
                Presentes
              </h3>
              <h1>
                {{ $Nropresente }}
              </h1>
            </div>
            <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-check mdi-48px"></i></span>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-content" style="padding: 0.5em">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3>
                Ausentes
              </h3>
              <h1>
                {{ $NroNOpresente }}
              </h1>
            </div>
            <span class="icon widget-icon text-red-500"><i class="mdi mdi-account-minus mdi-48px"></i></span>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-content" style="padding: 0.5em">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3>
                Fichas de Identificación
              </h3>
              <h1>
                {{ $FichaIdentificacion }}
              </h1>
            </div>
            <span class="icon widget-icon text-purple-500"><i class="mdi mdi-clipboard-text mdi-48px"></i></span>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-content" style="padding: 0.5em">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3>
                Fichas de Respuestas
              </h3>
              <h1>
                {{ $FichaRespuesta }}
              </h1>
            </div>
            <span class="icon widget-icon text-purple-500"><i class="mdi mdi-clipboard-check mdi-48px"></i></span>
          </div>
        </div>
      </div>
    </div>
</div>
