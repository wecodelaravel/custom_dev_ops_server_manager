    <div class="col-md-12">
        <div class="box box-widget">
            <div class="box-header with-border">
                <i class="fa fa-warning"></i>
                <h3 class="box-title">Legend</h3>

                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">

                <div class="mermaid col-md-12" id="mermaidChart1" style="font-size:2rem!important;">
                graph LR
                    classDef before fill:#AEB6BF,stroke:#000,stroke-width:2px,padding:2px;
                    classDef serverexists fill:#fff,stroke:#ff0000,stroke-width:3px,padding:2px;
                    classDef hascaipy fill:#fff,stroke:#039BE5,stroke-width:3px,padding:2px;
                    classDef needsconf fill:#fff,stroke:#33CC00,stroke-width:3px,padding:2px;
                    classDef configured fill:#33CC00,stroke:#000,stroke-width:2px,padding:2px;
                    classDef running fill:#33CC00,stroke:#33CC00,stroke-width:2px,padding:2px;
                    classDef notrunning fill:#FFFF00,stroke:#ff0000,stroke-width:2px,padding:2px;
                    classDef stopped fill:#ff0000,stroke:#000,stroke-width:2px,padding:2px;

                    subgraph .

                    1[Not Touched Yet] ==>2[Server Exists]
                    2==>3[Has Caipy]
                    3==>4[Needs CONF]
                    4==>5[Configured & Ready]
                    5==>6[Running]
                    6==>7[Not Running]
                    7==>8[Stopped]

                    class 1 before
                    class 2 serverexists
                    class 3 hascaipy
                    class 4 needsconf
                    class 5 configured
                    class 6 running
                    class 7 notrunning
                    class 8 stopped
                    end

                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
