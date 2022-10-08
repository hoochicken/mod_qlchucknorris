<?php
/**
 * @package		mod_qlchucknorris
 * @copyright	Copyright (C) 2019 ql.de All rights reserved.
 * @author 		Mareike Riegel mareike.riegel@ql.de
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

class mar
{

    /**
     * labels for buttons, separated by linebreak
     * @var string
     */
    private static $strButtons = 'Kick
Punch
Ouch!
Oo-ho-oops
Hurt Me Plenty
Knee-deep in Blood
I Can Win
Jab!
Roundhouse KicK
Go Cry to Ya Mama';

    /**
     * labels for paragraphsa and divs, separated by linebreak
     * @var string
     */
    private static $strText = 'When Chuck Norris throws exceptions, it\'s across the room.
All arrays Chuck Norris declares are of infinite size, because Chuck Norris knows no bounds.
Chuck Norris doesn\'t have disk latency because the hard drive knows to hurry the hell up.
Chuck Norris writes code that optimizes itself.
Chuck Norris can\'t test for equality because he has no equal.
Chuck Norris doesn\'t need garbage collection because he doesn\'t call .Dispose(), he calls .DropKick().
Chuck Norris\'s first program was kill -9.
Chuck Norris burst the dot com bubble.
All browsers support the hex definitions #chuck and #norris for the colors black and blue.
MySpace actually isn\'t your space, it\'s Chuck\'s (he just lets you use it).
Chuck Norris can write infinite recursion functions…and have them return.
Chuck Norris can solve the Towers of Hanoi in one move.
The only pattern Chuck Norris knows is God Object.
Chuck Norris finished World of Warcraft.
Project managers never ask Chuck Norris for estimations…ever.
Chuck Norris doesn\'t use web standards as the web will conform to him.
--It works on my machine-- always holds true for Chuck Norris.
Whiteboards are white because Chuck Norris scared them that way.
Chuck Norris doesn\'t do Burn Down charts, he does Smack Down charts.
Chuck Norris can delete the Recycling Bin.
Chuck Norris\'s beard can type 140 wpm.
Chuck Norris can unit test entire applications with a single assert.
Chuck Norris doesn\'t bug hunt as that signifies a probability of failure, he goes bug killing.
Chuck Norris\'s keyboard doesn\'t have a Ctrl key because nothing controls Chuck Norris.
When Chuck Norris is web surfing websites get the message --Warning: Internet Explorer has deemed this user to be malicious or dangerousProceed?--.
Chuck Norris CAN divide by 0.
Chuck Norris\' keyboard has 2 keys: 0 and 1.
Chuck Norris can overflow your stack just by looking at it.
To Chuck Norris, everything contains a vulnerability.
Malicious File Execution. Nuff said.
Chuck Norris doesn\'t need sudo, he just types --Chuck Norris-- before his commands.
Two words: B r u t e  F o r c e.
Chuck Norris doesn\'t need a debugger, he just stares down the bug until the code confesses.
Chuck Norris can access private methods.
Chuck Norris can instantiate an abstract class.
Chuck Norris does not need to know about class factory pattern. He can instantiate interfaces.
Chuck Norris doesn\'t use strongly-typed languages. He uses strong languages.
Chuck Norris knows the last digit of PI.
Bill Gates thinks he\'s Chuck Norris. Chuck Norris actually laughed. Once.
The programs that Chuck Norris writes don\'t have version numbers because he only writes them once. If a user reports a bug or has a feature request they don\'t live to see the sun set.
Chuck Norris doesn\'t believe in floating point numbers because they can\'t be typed on his binary keyboard.
Chuck Norris\' Internet connection is faster upstream than downstream because even data has more incentive to run from him than to him.
No statement can catch the ChuckNorrisException.
Chuck Norris solved the Travelling Salesman problem in O(1) time. Here\'s the pseudo-code: Break salesman into N pieces. Kick each piece to a different city.
When Chuck Norris points to NULL, Null gets scared.
Chuck Norris writes function thare have no arguments at all.
Chuck Norris never gets a syntax error. Instead, The language gets an DoesNotConformToChuck error.
Chuck Norris doesn\'t need to use AJAX because pages are too afraid to postback anyways.
Chuck Norris doesn\'t use reflection, reflection asks politely for his help.
There is no Esc key on Chuck Norris\' keyboard, because no one escapes Chuck Norris.
Chuck Norris can inherit from sealed/final classes
Chuck Norris doesn\'t delete files, he --Blows them away--.
Chuck Norris don\'t need passwords to access your system, he simply gets access.
Chuck Norris can binary search unsorted data.
Chuck Norris doesn\'t needs try-catch, exceptions are too afraid to raise.
Chuck Norris went out of an infinite loop.
If Chuck Norris writes code with bugs, the bugs fix themselves.
Chuck Norris can read all encrypted data, because nothing can hide from Chuck Norris.
When a bug sees Chuck Norris, it flees screaming in terror, and then immediately self-destructs to avoid being roundhouse-kicked.
Chuck Norris doesn\'t ask the computer to do some tasks, he just force it to do them.
Chuck Norris command line: Chuck Norris> Error, nothing follows Chuck Norris.
Chuck Norris can access the DB from the UI.
Chuck Norris\'s keyboard has the Any key.
Chuck Norris\' programs never exit, they terminate!
Chuck Norris protocol design method has no status, requests or responses, only commands.
Chuck Norris programs occupy 150% of CPU, even when they are not executing.
Chuck Norris can spawn threads that complete before they are started.
Chuck Norris programs do not accept input.
If Chuck Norris sings karaoke you better not smile.
Chuck Norris can compile syntax errors.
Chuck Norris does not declare vars. He owns them.
All items in linked lists are linking to Chuck Norris.
Chuck Norris does not sort, he sorts things out.
Chuck Norris does not sort. He creates order!
Chuck Norris does not sort. He says what he wants and gets it.
Chuck Norris does not sort. He doesn\'t need to. He gives a name, and the searched data steps forward.
Chuck Norris does not execute transactions. He makes \'em pay!
Every SQL statement that Chuck Norris codes has an implicit --COMMIT-- in its end.
Chuck Norris does not need to type-cast. The Chuck-Norris Compiler (CNC) sees through things. All way down. Always...
Chuck Norris never gets --data-trancated-- error. Instead, his run-time environment logs --variable-extended--.
Chuck Norris does not code in cycles, he codes in strikes.
Chuck Norris does need specifications. He has a technical writer to describe what he had done.
Chuck Norris compresses his files by doing a flying round house kick to the hard drive.
Chuck Norris doesn\'t use a computer because a computer does everything slower than Chuck Norris
Chuck only does linear decision trees.
Chuck Norris can retrieve anything from /dev/null.
Chuck Norris can order programs run faster.
Chuck Norris will kill all programs that perform an illegal operation.
Chuck Norris does not sort, he orders.
Chuck Norris doesn\'t use GUI, he prefers COMMAND line.
Chuck Norris doesn\'t use Oracle, he is the Oracle.
Chuck Norris uses canvas in IE.
Don\'t worry about tests, Chuck Norris\'s test cases cover your code too.
Each hair in Chuck Norris\'s beard contribute to make the world\'s largest DDOS.
Chuck Norris\' log statements are always at the FATAL level.
Chuck Norris\' database has only one table, \'Kick\', which he DROPs frequently.
Chuck Norris\' css uses the kick-box-model.
Chuck Norris types with his right index finger. He points at the keyboard and the keyboard does the rest.
Chuck Norris\' brain waves are suspected to be harmful to cell phones.
Chuck Norris does infinit loops in 3.62 seconds.
Chuck Norris can make void functions return a value.
Chuck norris can use VB in a Mac.
Windows does not ask Chuck Norriw for a password, Chuck Norris ask Windows for it.
Chuck Norris doesnt need to use endif.
Chuck Norris doesn\'t pack files, they do it themselve.
Chuck Norris can write to an input stream.
Chuck Norris can read from an output stream.
Chuck Norris never has to --sudo-- any command. In fact, unbeknownst to everyone, UNIX aliases --sudo-- to --chucknorris_mode--.
Chuck Norris never has to build his program to machine code. Machines have learnt to interpret Chuck Norris code.
Chuck Norris download the emails with his pickup.
Chuck Norris can violate the MIT license.
Chuck Norris causes the Windows Blue Screen of Death.
Chuck Norris has never submitted any fact to this site. Chuck Norris does not believe in any form of submission.
Chuck Norris wrote and compiled the first C compiler ... in C.
Chuck Norris computed all primes ... in his sleep.
Chuck Norris can reverse any hash ... just by looking at it.
All statements in a Chuck Norris script evaluate to true. Nothing contradicts Chuck Norris.
Chuck Norris knows the linux kernel source code ... from memory.
Chuck Norris can perform a DoS attack by looking at a system.
When Chuck Norris uses the --do() ... orelse{}-- statement the computer either does magic or shuts it self down.
Chuck Norris knows your ip ... and your password.
Chuck Norris can call main() recursively.
Chuck Norris doesn\'t write programs, he generates all possible programs and chooses the one he wants.
Chuck Norris can read a password typed in a password input box.
The first language created was called C, after Chuck. To call it CN would have been redundant.';

    /**
     * @return string
     */
    static public function getText() {
        return self::$strText;
    }
    /**
     * @return string
     */
    static public function getButtons() {
        return self::$strButtons;
    }
}