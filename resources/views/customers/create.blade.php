@extends('layouts.default')
@section('title')
    Мижоз қўшиш
@endsection
@section('content')
    <style>
        .input-numeral{
            text-align: right;
        }
    </style>
    <div class="col">
        <form method="POST" action="{{'/'}}">
            {{csrf_field()}}
            <div class="form-group">
                <div class="card">
                <div class="card-header">
                    Мижоз қўшиш
                </div>
                    <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <label for="name">Ф.И.Ш</label>
                        <input type="text" class="form-control" id="name" name="name" autofocus>
                        <div class="row">
                            <div class="col">
                                <label for="birthdate">Туғилган сана</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate">
                            </div>
                            <div class="col">
                                <label for="phonenumber">Телефон</label>
                                <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="+998">
                            </div>
                            <div class="col">
                                <label for="phonenumber1">Телефон (ихтиёрий)</label>
                                <input type="text" class="form-control" id="phonenumber1" name="phonenumber1" value="+998">
                            </div>
                            <div class="col-md-5">
                                <label for="adress">Манзил</label>
                                <input type="text" class="form-control" id="adress" name="adress">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="pserie">Паспорт серияси</label>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <select class="form-control" id="pserie" name="pserie">
                                            <option value="AA">
                                                AA
                                            </option>
                                            <option value="AB">
                                                AB
                                            </option>
                                            <option value="AC">
                                                AC
                                            </option>
                                            <option value="CR">
                                                CR
                                            </option>
                                            <option value="CT">
                                                CT
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" id="pnumber" name="pnumber">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <label for="pgivendate">Берилган сана</label>
                                <input type="date" class="form-control" id="pgivendate" name="pgivendate">
                            </div>
                            <div class="col-md-6">
                                <label for="pgivenby">Ким томонидан берилган</label>
                                <select class="form-control" id="pgivenby" name="pgivenby">
                                    <option value="Хоразм вилояти ИИБ">
                                        Хоразм вилояти ИИБ
                                    </option>
                                    <option value="Хоразм вилояти Урганч шаҳар ИИБ">
                                        Хоразм вилояти Урганч шаҳар ИИБ
                                    </option>
                                    <option value="Хоразм вилояти Урганч туман ИИБ">
                                        Хоразм вилояти Урганч туман ИИБ
                                    </option>
                                    <option value="Хоразм вилояти Хонқа туман ИИБ">
                                        Хоразм вилояти Хонқа туман ИИБ
                                    </option>
                                    <option value="Хоразм вилояти Янгиариқ туман ИИБ">
                                        Хоразм вилояти Янгиариқ туман ИИБ
                                    </option>
                                    <option value="Хоразм вилояти Янгибозор туман ИИБ">
                                        Хоразм вилояти Янгибозор туман ИИБ
                                    </option>
                                    <option value="Хоразм вилояти Қўшкўпир туман ИИБ">
                                        Хоразм вилояти Қўшкўпир туман ИИБ
                                    </option>
                                    <option value="Хоразм вилояти Хазорасп туман ИИБ">
                                        Хоразм вилояти Хазорасп туман ИИБ
                                    </option>
                                    <option value="Хоразм вилояти Гурлан туман ИИБ">
                                        Хоразм вилояти Гурлан туман ИИБ
                                    </option>
                                    <option value="Хоразм вилояти Хива туман ИИБ">
                                        Хоразм вилояти Хива туман ИИБ
                                    </option>
                                    <option value="Хоразм вилояти Боғот туман ИИБ">
                                        Хоразм вилояти Боғот туман ИИБ
                                    </option>
                                    <option value="Хоразм вилояти Шовот туман ИИБ">
                                        Хоразм вилояти Шовот туман ИИБ
                                    </option>
                                </select>
                            </div>
                        </div>
                        <label for="comment">Қўшимча маълумот</label>
                        <textarea class="form-control" type="text" id="comment" name="comment"></textarea>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="exportdate">Шартнома тузилган сана</label>
                                <input class="form-control" type="date" id="exportdate" name="exportdate">
                            </div>
                            <div class="col">
                                <label for="summ">Шартнома суммаси</label>
                                <input class="form-control input-numeral summ" type="text" id="sum" name="summ" onkeyup="calc()">
                            </div>
                            <div class="col">
                                <label for="pre">Олдиндан тўлов, %</label>
                                <input class="form-control input-numeral pre" type="text" id="pre" value="30" onkeyup="calc()">
                            </div>
                            <div class="col">
                                <label for="com">Комиссия, %</label>
                                <input class="form-control input-numeral com" type="text" id="com" value="3" onkeyup="calc()">
                            </div>
                            <div class="col">
                                <label for="liz">Лизинг, %</label>
                                <input class="form-control input-numeral liz" type="text" id="liz" value="30" onkeyup="calc()">
                            </div>
                            <div class="col">
                                <label for="fem">Myддати, ойда</label>
                                <input class="form-control input-numeral fem" type="text" id="fem" value="12" onkeyup="calc()">
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Умумий тўлов суммаси:</label>
                                <input class="form-control input-numeral suma" id="suma">
                            </div>
                            <div class="col">
                                <label>Олдиндан тўлов</label>
                                <input class="form-control input-numeral prea" id="prea" name="pre">
                            </div>
                            <div class="col">
                                <label>Комиссия</label>
                                <input class="form-control input-numeral coma" id="coma" name="com">
                            </div>
                            <div class="col">
                                <label>Лизинг</label>
                                <input class="form-control input-numeral liza" id="liza" name="liz">
                            </div>
                            <div class="col">
                                <label>Ойлик тўлов</label>
                                <input class="form-control input-numeral fema" id="fema" name="fem">
                            </div>
                        </div>
                    </div> 
                    <div class="card-footer">
                        <input type="submit" value="Киритиш" class="float-right btn btn-success">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="js/cleave.js"></script>
    <script>
        var csumm = new Cleave('.summ',{
            numeral: true,
            delimiter: " ",
            numeralThousandsGroupStyle: 'thousand'
        });
        var cpre = new Cleave('.pre',{
            numeral: true,
            delimiter: " ",
            numeralThousandsGroupStyle: 'thousand'
        });
        var ccom = new Cleave('.com',{
            numeral: true,
            delimiter: " ",
            numeralThousandsGroupStyle: 'thousand'
        });
        var cliz = new Cleave('.liz',{
            numeral: true,
            delimiter: " ",
            numeralThousandsGroupStyle: 'thousand'
        });
        var cfem = new Cleave('.fem',{
            numeral: true,
            delimiter: " ",
            numeralThousandsGroupStyle: 'thousand'
        });
        var csuma = new Cleave('.suma',{
            numeral: true,
            delimiter: " ",
            numeralThousandsGroupStyle: 'thousand'
        });
        var cprea = new Cleave('.prea',{
            numeral: true,
            delimiter: " ",
            numeralThousandsGroupStyle: 'thousand'
        });
        var ccoma = new Cleave('.coma',{
            numeral: true,
            delimiter: " ",
            numeralThousandsGroupStyle: 'thousand'
        });
        var cliza = new Cleave('.liza',{
            numeral: true,
            delimiter: " ",
            numeralThousandsGroupStyle: 'thousand'
        });
        var cfema = new Cleave('.fema',{
            numeral: true,
            delimiter: " ",
            numeralThousandsGroupStyle: 'thousand'
        });
        Date.prototype.toDateInputValue = (function() {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0,10);
        });
        document.getElementById('exportdate').value = new Date().toDateInputValue();
        function calc(){
            Number.prototype.format = function(n, x, s, c) {
                var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
                    num = this.toFixed(Math.max(0, ~~n));

                return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
            };
            Number.prototype.beauty = function(n, x, s, c) {
                var re = '\\d(?=(\\d{' + (3 || 3) + '})+' + (2 > 0 ? '\\D' : '$') + ')',
                    num = this.toFixed(Math.max(0, ~~2));

                return ('.' ? num.replace('.', '.') : num).replace(new RegExp(re, 'g'), '$&' + (' ' || ','));
            };

            var sum = document.getElementById("sum").value.replace(/ /g,"");
            var pre = document.getElementById("pre").value.replace(/ /g,"");
            var com = document.getElementById("com").value.replace(/ /g,"");
            var liz = document.getElementById("liz").value.replace(/ /g,"");
            var fem = document.getElementById("fem").value.replace(/ /g,"");

            var prea = sum*pre/100;
            var coma = sum*com/100;
            var liza = (sum-prea)*(1+liz/100);
            var fema = liza/fem;

            document.getElementById("suma").value = (liza+prea).beauty();
            document.getElementById("prea").value = (prea+coma).beauty();
            document.getElementById("coma").value = (coma).beauty();
            document.getElementById("liza").value = (liza).beauty();
            document.getElementById("fema").value = (fema).beauty();
        }
    </script>
@endsection