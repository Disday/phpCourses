SELECT weathers.id FROM weathers
JOIN weathers as weathers2 ON weathers.id = weathers2.id + 1
WHERE weathers.temperature > weathers2.temperature;