<script src="/includes/jquery/autocomplete/jquery.autocomplete.min.js" type="text/javascript"></script>
<link media="screen" rel="stylesheet" href="/includes/jquery/autocomplete/jquery.autocomplete.css" type="text/css">

<form id="mod_usr_search_form" class="round4" method="post" action="/users/search.html">
    <div>
        <div class="line">
            <span>Найти</span>
            <select name="gender" id="gender" style="width:150px">
                <option value="f">женщин</option>
                <option value="m">мужчин</option>
                <option value="0" selected>всех</option>
            </select>
        </div>
        <div class="line">
                <span>от</span>
                <input style="text-align:center;width:56px" name="agefrom" type="text" id="agefrom" value="18"/>
                <span>до</span>
                <input style="text-align:center;width:56px" name="ageto" type="text" id="ageto" value=""/>
                <span>лет</span>
        </div>
        <div class="line">
                <span>имя</span> 
                <input style="text-align:center;width:160px" id="name" name="name" type="text" value=""/>
        </div>
        <div class="line">
                <span>город</span> 
                <input style="text-align:center;width:149px" id="city" name="city" type="text" value=""/>
                <script type="text/javascript">
                    {$autocomplete_js}
                </script>
        </div>
        <div class="line">
                <span>интересы</span> 
                <input style="text-align:center;width:125px" id="hobby" name="hobby" type="text" value=""/>
        </div>
        <div class="line">
                <input class="button round4" name="gosearch" type="submit" id="gosearch" value="Найти!" />
        </div>
    </div>
</form>