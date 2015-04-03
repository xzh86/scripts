#!/usr/bin/perl -w
use strict;
use Encode;
my $count=0;
my $num=0;
my $split_line=20000;
while (my $line=<>)
{
        chomp($line);
        my $tmp_col = encode("gb2312", decode("utf8", $line));
        print "$tmp_col\n";
}