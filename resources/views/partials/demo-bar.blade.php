@if (config('demo.enabled'))
    <div role="note" style="background:#0f0225;color:#e9defc;font:600 13px/1.5 system-ui,sans-serif;text-align:center;padding:8px 14px;border-bottom:1px solid #7C3AED;position:relative;z-index:60;">
        Demonstração de portefólio por <a href="{{ config('demo.portfolio_url') }}" style="color:#fff;text-decoration:underline;">Francisco</a>
        (portfolio demo): os dados são repostos regularmente. <strong>Não uses dados reais</strong> (NIF, telefone, morada).
        @unless (\App\Support\DemoMode::isDemoAdmin(auth()->user()))
            <a href="{{ route('demo.admin') }}" style="margin-left:8px;background:#7C3AED;color:#fff;border-radius:999px;padding:3px 12px;text-decoration:none;white-space:nowrap;">Ver a área de admin</a>
        @endunless
    </div>
@endif
