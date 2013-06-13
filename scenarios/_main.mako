<%def name="recursive_expand(dikt, delimiter='\\')">
<%
    if not dikt:
        raise StopIteration
    
    keys = sorted(dikt.keys(), key=lambda x: isinstance(dikt[x], dict))
    try:
        last = keys[-1]
    except IndexError:
        last = keys[0]
    
    lines = []
    for k in keys:
        if isinstance(dikt[k], dict):
            for subk, v, slash in recursive_expand(dikt[k], delimiter):
                lines.append(('{0}[{1}]'.format(k, subk), v, slash))
        else:
            lines.append((k, dikt[k], '' if k is last else delimiter))
    return lines
%>
</%def>

## http://stackoverflow.com/a/6701741/133514
<%def name="route_for_endpoint(endpoint, select=None)">
<%
  return context['Endpoint'](ctx, endpoint, select)
%>
</%def>

<%def name="interpolate_uri(uri, **kwargs)">
<%
  # this basically parses :bank_account_id to a string with {bank_account_id}
  # for much easier interpolation.
  import re
  # note that it shouldn't start with a digit!
  _uri = re.sub('(:([^\d]\w+))+', r'{\2}', uri)
  return _uri.format(**kwargs)
%>
</%def>

<%def name="make_endpoint(endpoint_name, select=None)">
<%
  return context['Endpoint'](ctx, endpoint_name, select)
%>
</%def>

<%def name="php_boilerplate()">
## i'm putting this between an interpolation because pycharm's introspection
## correctly detects that this is an unclosed tag and warns me..annoying.
${"<?php"}

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

%if api_location:
Balanced\Settings::configure("${api_location}", "${ctx.api_key}");
%else:
Balanced\Settings::$api_key = "${ctx.api_key}";
%endif

</%def>

<%def name="python_boilerplate()">
import balanced

%if api_location:
balanced.config.root_uri = "${api_location}"
%endif
balanced.configure("${ctx.api_key}")

</%def>

<%def name="ruby_boilerplate()">
require 'balanced'
%if api_location:
<%
  import urlparse
  parsed_url = urlparse.urlparse(api_location)
  _root_url = parsed_url.netloc
  if ':' in _root_url:
      _root_url, _, _ = parsed_url.netloc.partition(':')

%>
options = {
  :scheme => 'http',
  :host => '${_root_url}',
  :port => 5000,
}
Balanced.configure('${ctx.api_key}', options)
%else:
Balanced.configure('${ctx.api_key}')
%endif
</%def>


<%def name="curl_show_template(endpoint_name)">
% if mode == 'definition':
<%
  ep = Endpoint(ctx, endpoint_name, select='shortest')
%>
   ${ep.method} ${ep.url}
% else:
  <%
    slash = '\\'
  %>
  curl ${Endpoint.qualify_uri(ctx, request['uri'])} ${slash}
     -u ${ctx.api_key}:
% endif
</%def>


<%def name="curl_create_template(endpoint_name, uri='uri', ep=None)">
<%
  ep = Endpoint(ctx, endpoint_name, select='shortest')
%>
%if mode == 'definition':
   ${ep.method} ${ep.url}
%elif mode == 'request':
  <%
    slash = '\\'
  %>
  curl ${Endpoint.qualify_uri(ctx, request[uri])} ${slash}
     -u ${ctx.api_key}: ${slash}
  %if 'payload' in request:
   %for k, v, slash in recursive_expand(request['payload']):
     -d "${k}=${v}" ${slash}
   %endfor
  %else:
     -X POST
  %endif
%endif
</%def>

<%def name="curl_update_template(endpoint_name, uri='uri', ep=None)">
<%
  ep = Endpoint(ctx, endpoint_name, select='shortest')
%>
%if mode == 'definition':
   ${ep.method} ${ep.url}
%elif mode == 'request':
  <%
    slash = '\\'
  %>
  curl ${Endpoint.qualify_uri(ctx, request[uri])} ${slash}
     -u ${ctx.api_key}: ${slash}
     -X PUT ${slash}
   %for k, v, slash in recursive_expand(request['payload']):
     -d "${k}=${v}" ${slash}
   %endfor
%endif
</%def>


<%def name="curl_list_template(endpoint_name, limit=2, ep=None)">
<%
  ep = Endpoint(ctx, endpoint_name, select='shortest')
%>
% if request == 'definition':
  ${ep.method} ${ep.url}
%elif mode == 'request':
  <%
    slash = '\\'
  %>
   curl ${Endpoint.qualify_uri(ctx, request['uri'], limit=limit)} ${slash}
      -u ${ctx.api_key}:
% endif
</%def>

<%def name="curl_delete_template(endpoint_name, ep=None)">
<%
  ep = Endpoint(ctx, endpoint_name)
%>
% if mode == 'definition':
  ${ep.method} ${ep.url}
% else:
  <%
    slash = '\\'
  %>
   curl ${Endpoint.qualify_uri(ctx, request['uri'])} ${slash}
     -u ${ctx.api_key}: ${slash}
     -X DELETE
% endif
</%def>

