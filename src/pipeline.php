<?php require __DIR__ . '/../vendor/autoload.php'; use function Funct\Collection\flatten;

function getFreeDomainsCount($emails)
{
  $domainsMap = array_map(function ($email){
    return explode('@', $email)[1];
  }, $emails);
  $freeDomains = array_filter($domainsMap, function($domain){
    return in_array($domain, FREE_EMAIL_DOMAINS);
  });
  return array_reduce($freeDomains, function($result, $domain){
    if(!array_key_exists($domain, $result)){
      $result[$domain] = 0;
    } 
    $result[$domain] +=1;
    return $result;
  }, []);
}


$emails = [
  'info@gmail.com',
  'info@yandex.ru',
  'info@hotmail.com',
  'mk@host.com',
  'support@hexlet.io',
  'key@yandex.ru',
  'sergey@gmail.com',
  'vovan@gmail.com',
  'vovan@hotmail.com'
];
const FREE_EMAIL_DOMAINS = [
  'gmail.com', 'yandex.ru', 'hotmail.com'
];
print_r(getFreeDomainsCount($emails));
# Array (
#     'gmail.com' => 3
#     'yandex.ru' => 2
#     'hotmail.com' => 2
#  )print_r(getMenCountByYear($users));
