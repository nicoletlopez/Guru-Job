
Select Country (with states):
<select id="country" name ="country"></select><br/>
Select State/City:
<select name ="state" id ="state"></select>
<script type="text/javascript" src="{{asset('js/custom/countries.js')}}"></script>
<script language="javascript">
    populateCountries("country", "state");
</script>