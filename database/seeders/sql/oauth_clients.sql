UPDATE oauth_clients
SET name = 'Laravel Password Grant Client',
    secret = 'IPRahHhmqyyPHWw1eclDbcQc5TWsjK4yY9gr1US0',
    provider = 'users'
WHERE oauth_clients.id = 2;
