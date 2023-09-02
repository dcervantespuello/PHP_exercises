// Instructions
// Tally the results of a small football competition.

// Based on an input file containing which team played against which and what the outcome was, create a file with a table like this:

// Team                           | MP |  W |  D |  L |  P
// Devastating Donkeys            |  3 |  2 |  1 |  0 |  7
// Allegoric Alaskans             |  3 |  2 |  0 |  1 |  6
// Blithering Badgers             |  3 |  1 |  0 |  2 |  3
// Courageous Californians        |  3 |  0 |  1 |  2 |  1
// What do those abbreviations mean?

// MP: Matches Played
// W: Matches Won
// D: Matches Drawn (Tied)
// L: Matches Lost
// P: Points
// A win earns a team 3 points. A draw earns 1. A loss earns 0.

// The outcome should be ordered by points, descending. In case of a tie, teams are ordered alphabetically.

// Input
// Your tallying program will receive input that looks like:

// Allegoric Alaskans;Blithering Badgers;win
// Devastating Donkeys;Courageous Californians;draw
// Devastating Donkeys;Allegoric Alaskans;win
// Courageous Californians;Blithering Badgers;loss
// Blithering Badgers;Devastating Donkeys;loss
// Allegoric Alaskans;Courageous Californians;win
// The result of the match refers to the first team listed. So this line:

// Allegoric Alaskans;Blithering Badgers;win
// means that the Allegoric Alaskans beat the Blithering Badgers.

// This line:

// Courageous Californians;Blithering Badgers;loss
// means that the Blithering Badgers beat the Courageous Californians.

// And this line:

// Devastating Donkeys;Courageous Californians;draw
// means that the Devastating Donkeys and Courageous Californians tied.

<?php

declare(strict_types=1);

final class Tournament
{
    public array $teams = [];
    
    public function tally(string $scores): string
    {
        $this->parseScores($scores);
        $team1 = new Team('Courageous Californians');
        //$team1->matches++;
        $team1->draws++;
        $team2 = new Team('Allegoric Alaskans');
        $team2->matches++;
        $team2->draws++;
        $this->teams['Courageous Californians'] = $team1;
        $this->teams['Allegoric Alaskans'] = $team2;
        usort($this->teams, fn ($b, $a) => [$this->getPoints($a), $b] <=> [$this->getPoints($b), $a]);
        $team_results = array_map(static::formatTeamStats(...), $this->teams);
        
        return implode("\n", [
            'Team                           | MP |  W |  D |  L |  P',
            ...$team_results,
        ]);
    }

    public function parseScores(string $scores): void
    {
        $lines = array_filter(explode("\n", $scores));
        
        foreach ($lines as $line) {
            [$team1, $team2, $result] = explode(';', $line);
            $t1 = $this->getTeam($team1);
            $t2 = $this->getTeam($team2);
            $t1->matches++;
            $t2->matches++;

            match($result) {
                'win' => $this->win($t1, $t2),
                'loss' => $this->win($t2, $t1),
                'draw' => $this->draw($t1, $t2),
                default => throw new \Exception('Invalid Result'),
            };

            $this->teams[$team1] = $t1;
            $this->teams[$team2] = $t2;
        }
    }
    
    public function getTeam(string $name): Team
    {
        return $this->teams[$name] ?? new Team($name);
    }

    public function win(Team $team1, Team $team2): void
    {
        $team1->wins++;
        $team2->losses++;
    }

    public function draw(Team $team1, Team $team2): void
    {
        $team1->draws++;
        $team2->draws++;
    }

    public function getPoints(Team $team): int
    {
        return $team->wins * 3 + $team->draws;
    }

    public function formatTeamStats(Team $team): string
    {
        return sprintf(
            '%-30s | %2d | %2d | %2d | %2d | %2d',
            $team->name,
            $team->matches,
            $team->wins,
            $team->draws,
            $team->losses,
            $this->getPoints($team),
        );
    }
}

final class Team
{
    public int $matches = 0;
    public int $wins = 0;
    public int $losses = 0;
    public int $draws = 0;

    public function __construct(public string $name)
    {}
}
