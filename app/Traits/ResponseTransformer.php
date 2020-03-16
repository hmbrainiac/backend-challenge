<?php
namespace App\Traits;

trait ResponseTransformer
{

    /**
     * format feteched repos
     * @return array
     */
    public function formatResponse(array $response)
    {
        $languages = [];
        foreach ($response as $value) {
            if (!array_key_exists($value->language, $languages)) {
                $languages[$value->language] = $this->newResponseObject($value);
            } else {
                $languages[$value->language] = $this->updateResponseObject($languages[$value->language], $value);
            }
        }
        return $languages;
    }

    /**
     * update an existing language object
     * @return object
     */

    private function newResponseObject($item)
    {
        $responseObject = new \stdClass;
        $responseObject->numberRepos = 1;
        $responseObject->language = $item->language;
        $responseObject->listRepos[0] = $item;
        return $responseObject;
    }

    /**
     * update an existing language object
     * @return object
     */
    private function updateResponseObject($existingObject, $item)
    {
        $existingObject->listRepos[$existingObject->numberRepos] = $item;
        $existingObject->numberRepos++;
        return $existingObject;
    }
}
