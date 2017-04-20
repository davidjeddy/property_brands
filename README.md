# Property Brands

## Unit Sort Test

### Summary
 
We often deal with unit number / resident name data. These two pieces of information are used by our users to identify a lease.
Many of our screens and reports show a list of leases. The task is to sort lease data read from a file and to print the sorted data to STDOUT.
The data looks as follows (actual data file attached):
 
#50 - Smith
#8 - Johnson
#100 - Sanders
#1B - Adams
#1A – Kessenich
 
Each line contains a unit number and a resident name. The data should be sorted by unit number.


# Assumptions
Santizited and Normalized output strings. IE each row using the same seperators between unit and name.
Source data set could be 1 item, could a billion.
A pre-described set of characters will seperate the unit from the person in each line of the source data.
Database storage is not available, 'cause that is how the data should be injested, stored, egressed.
Normaized and sanitized reports are not available; thus the logic is responsible for such actions.


# Requirements
Read data from text (txt) file.
Sort based on #{unit number}.
Print sorted array to stdout.

# To Execute

## Docker
Required Docker 1.14 and pre-req.

`docker build -t example . &&  docker run -it --rm --name property_brands example`

## Native (Requires PHP 7.x)
`php -f index.php`


# To Test

## Docker
`docker run -v $(pwd):/app --rm phpunit/phpunit run`

## Native (Requires PHPUnit 6+)
`phpunit ./`
