  RewriteEngine on
# RewriteLog /var/log/httpd/rewrite_log
# RewriteLogLevel 3

  RewriteCond %{QUERY_STRING} ^p=([a-z0-9\.-]+)$
  RewriteRule ^/$ \
        https://src.openvz.org/projects/OVZL/repos/%1? [R,L]

  # summary -> /
  RewriteCond %{QUERY_STRING} ^p=([a-z0-9\.-]+);a=summary$
  RewriteRule ^/$ \
        https://src.openvz.org/projects/OVZL/repos/%1?

  # shortlog, log -> commits
  RewriteCond %{QUERY_STRING} ^p=([a-z0-9\.-]+);a=(shortlog|log)$
  RewriteRule ^/$ \
        https://src.openvz.org/projects/OVZL/repos/%1/commits?

  # tree -> browse
  RewriteCond %{QUERY_STRING} ^p=([a-z0-9\.-]+);a=tree$
  RewriteRule ^/$ \
        https://src.openvz.org/projects/OVZL/repos/%1/browse?

  # tags -> ???? FIXME
  RewriteCond %{QUERY_STRING} ^p=([a-z0-9\.-]+);a=tags$
  RewriteRule ^/$ \
        https://src.openvz.org/projects/OVZL/repos/%1/branches?

  # branches -> branches
  RewriteCond %{QUERY_STRING} ^p=([a-z0-9\.-]+);a=branches$
  RewriteRule ^/$ \
        https://src.openvz.org/projects/OVZL/repos/%1/branches?

  # commit, commitdiff -> commits
  RewriteCond %{QUERY_STRING} ^p=([a-z0-9\.-]+);a=(commit|commitdiff);h=(\w+)[;]*$
  RewriteRule ^/$ \
        https://src.openvz.org/projects/OVZL/repos/%1/commits/%3?

  # log until a tag
  # shortlog, log -> commits
  RewriteCond %{QUERY_STRING} ^p=([a-z0-9\.-]+);a=(shortlog|log);h=([a-z0-9\.-]+)[;]*$
  RewriteRule ^/$ \
        https://src.openvz.org/projects/OVZL/repos/%1/commits?until=refs/tags/%3

  # main page
  RewriteRule ^/$ \
        https://src.openvz.org/projects?
