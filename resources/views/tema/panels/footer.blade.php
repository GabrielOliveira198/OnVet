<!-- BEGIN: Footer-->
<footer class="footer {{($configData['footerType']=== 'footer-hidden') ? 'd-none':''}} footer-light">
  <p class="clearfix mb-0">
    <span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; <script>document.write(new Date().getFullYear())</script><a class="ml-25" href="{{ config('app.url') }}" target="_blank">{{ config('app.name') }}</a>
      <span class="d-none d-sm-inline-block">, Todos os direitos Reservados</span>
    </span>
    <span class="float-md-right d-none d-md-block">Desenvolvido por: <a class="ml-25" href="http://brunes.com.br" target="_blank">Brunes Consultoria</a></span>
  </p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->
