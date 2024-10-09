<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LigneDeclaration;

class LignededeclarationController extends Controller
{
    /**
     * Store a set of LigneDeclarations associated with a Declaration.
     *
     * @param array $ligneDeclarationsData
     * @param int $declarationId
     * @return bool
     */
    public function store(array $ligneDeclarationsData, $declarationId)
    {
        foreach ($ligneDeclarationsData as $ligneData) {
            $ligneDeclaration = new LigneDeclaration($ligneData);
            $ligneDeclaration->declaration_id = $declarationId; // Associate with the declaration

            // Handle file upload if it exists
            if (isset($ligneData['documents'])) {
                $filePath = $ligneData['documents']->store('documents'); // Store in 'documents' directory
                $ligneDeclaration->documents = $filePath; // Store the file path in the database
            }

            // Save the LigneDeclaration
            if (!$ligneDeclaration->save()) {
                return false; // Return false if saving fails
            }
        }

        return true; // Return true if all LigneDeclarations are saved successfully
    }
}
