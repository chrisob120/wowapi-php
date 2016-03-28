<?php namespace WowApi;

use WowApi\Components\Zone;
use WowApi\Services\CharacterService;
use WowApi\Services\GuildService;
use WowApi\Services\RealmService;
use WowApi\Services\MountService;
use WowApi\Services\AchievementService;
use WowApi\Services\AuctionService;
use WowApi\Services\BossService;
use WowApi\Services\PetService;
use WowApi\Services\QuestService;
use WowApi\Services\RecipeService;
use WowApi\Services\SpellService;
use WowApi\Services\ZoneService;

/**
 * WoW API Class
 *
 * Description
 *
 * @author      Chris O'Brien <chris@diobie.com>
 * @version     1.0.0
 */
class WowApi {

    /**
     * @var CharacterService $characterService
     */
    public $characterService;

    /**
     * @var RealmService $realmService
     */
    public $realmService;

    /**
     * @var GuildService $guildService
     */
    public $guildService;

    /**
     * @var MountService $mountService
     */
    public $mountService;

    /**
     * @var AchievementService $achievementService
     */
    public $achievementService;

    /**
     * @var AuctionService $auctionService
     */
    public $auctionService;

    /**
     * @var BossService $bossService
     */
    public $bossService;

    /**
     * @var PetService $petService
     */
    public $petService;

    /**
     * @var QuestService $questService
     */
    public $questService;

    /**
     * @var RecipeService $recipeService
     */
    public $recipeService;

    /**
     * @var SpellService $spellService
     */
    public $spellService;

    /**
     * @var ZoneService $zoneService
     */
    public $zoneService;

    /**
     * WowApi constructor
     *
     * @param string $apiKey
     * @param array|null $options
     */
    public function __construct($apiKey, $options = null) {
        $this->characterService = new CharacterService($apiKey, $options);
        $this->realmService = new RealmService($apiKey, $options);
        $this->guildService = new GuildService($apiKey, $options);
        $this->mountService = new MountService($apiKey, $options);
        $this->achievementService = new AchievementService($apiKey, $options);
        $this->auctionService = new AuctionService($apiKey, $options);
        $this->bossService = new BossService($apiKey, $options);
        $this->petService = new PetService($apiKey, $options);
        $this->questService = new QuestService($apiKey, $options);
        $this->recipeService = new RecipeService($apiKey, $options);
        $this->spellService = new SpellService($apiKey, $options);
        $this->zoneService = new ZoneService($apiKey, $options);
    }

}


use WowApi\Exceptions\WowApiException;
use WowApi\Util\Helper;

ini_set('display_errors', 1);
error_reporting(E_ALL);

// example
require_once 'autoload.php';
require_once '../../vendor/autoload.php';

$options = [
    'region' => 'us'
];

$t = new WowApi('n3hfnyv46xxdu88jp4z9q54qcfmbwgpb', $options);

try {
    //$z = $t->characterService->getCharacter('Hyjal', 'Ardeel');
    //$z = $t->realmService->getRealm('The Forgotten Coast');
    //$z = $t->realmService->getRealms();
    //$z = $t->realmService->sortRealms('type', 'rppvp');
    //$z = $t->guildService->getGuild('hyjal', 'tf', ['news']);
    //$z = $t->mountService->getMounts();
    //$z = $t->mountService->sortMounts('isAquatic', false);
    //$z = $t->achievementService->getAchievement(2144);
    //$z = $t->auctionService->getAuction('Hyjal');
    //$z = $t->bossService->getBoss(24723);
    //$z = $t->petService->getPets();
    //$z = $t->petService->getSpecies(258);
    //$z = $t->petService->getSpeciesStats(258, ['level' => 80, 'breedId' => 5, 'qualityId' => 4]);
    //$z = $t->questService->getQuest(13146);
    //$z = $t->recipeService->getRecipe(33994);
    //$z = $t->spellService->getSpell(8056);
    //$z = $t->zoneService->getZones();
    $z = $t->zoneService->getZone(4131);
    echo 'Returned: ' .count($z);
    Helper::print_rci($z);
} catch (WowApiException $ex) {
    echo $ex->getError();
}